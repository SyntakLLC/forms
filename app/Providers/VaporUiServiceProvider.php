<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class VaporUiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->gate();
    }

    /**
     * Register the Vapor UI gate.
     *
     * This gate determines who can access Vapor UI in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewVaporUI', function ($user = null) {
            return in_array(optional($user)->email, [
                'amaan@syntak.co',
                'emaadali@outlook.com'
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Ensure that Vapor's internal routes are defined.
     *
     * @return void
     */
    public function ensureRoutesAreDefined()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::post(
            '/vapor/signed-storage-url',
            SignedStorageUrlController::class . '@store'
        )->middleware([
            'web',
            Authenticate::class,
            DispatchServingNovaEvent::class,
            BootTools::class,
            Authorize::class,
            Authorize::class,
        ]);
    }
}
