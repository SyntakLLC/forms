<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $bindings = [
      \Spark\Actions\CreateSubscription::class => \App\Subscription\CreateSubscription::class
    ];

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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        if(env('APP_ENV') !== 'local')
//        {
            URL::forceScheme('https');
//        }
    }
}
