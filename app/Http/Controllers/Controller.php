<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard(Request $request, Site $site) {
        return Inertia::render('Dashboard', [
            'forms' => $request->user()->forms,
            'user' => $request->user(),
            'site' => $request->user()->site,
        ]);
    }

    public function updateCoverPicture(Request $request) {
        $photo = $request->photo;

        $user = $request->user();
        $user->forceFill([
            'cover_photo_url' => $photo->storePublicly(
                'cover-photos', ['disk' => isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public')]
            ),
        ])->save();

        $site = $user->site;
        $site->cover_photo_url = $photo->storePublicly(
            'cover-photos', ['disk' => isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public')]
        );
        $site->save();

        return Redirect::route('dashboard');
    }

    public function removeCoverPicture(Request $request) {
        $user = $request->user();
        $user->forceFill([
            'cover_photo_url' => null,
        ])->save();

        $site = $user->site;
        $site->cover_photo_url = null;
        $site->save();

        return Redirect::route('dashboard');
    }
}
