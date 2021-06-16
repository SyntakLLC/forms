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
        $logoImageURL = Storage::url('marketing-photos/Aboutcontact Logo Image.png');
        $logoTextURL = Storage::url('marketing-photos/Aboutcontact Logo Text.png');

        $standard = Storage::url('marketing-photos/Standard.png');
        $mobileProfile = Storage::url('marketing-photos/Mobile_Profile.png');
        $brandedLeft = Storage::url('marketing-photos/Brand_Left.png');
        $brandedRight = Storage::url('marketing-photos/Brand_Right.png');
        $minimalist = Storage::url('marketing-photos/Minimalist.png');

        return Inertia::render('Dashboard', [
            'forms' => $request->user()->forms,
            'user' => $request->user(),
            'site' => $request->user()->site,
            'logoImageURL' => $logoImageURL,
            'logoTextURL' => $logoTextURL,
            'standard' => $standard,
            'mobileProfile' => $mobileProfile,
            'brandedLeft' => $brandedLeft,
            'brandedRight' => $brandedRight,
            'minimalist' => $minimalist,
        ]);
    }

    public function updateCoverPicture(Request $request) {
        $filepath = 'cover-photos/' . $request->uuid . '.' . $request->extension;
        Storage::move($request->key, $filepath);

        $site = auth()->user()->site;
        $site->cover_photo_url = $filepath;
        $site->save();

        return Redirect::route('dashboard');
    }

    public function updateProfilePicture(Request $request) {
        $filepath = 'profile-photos/' . $request->uuid . '.' . $request->extension;
        Storage::move($request->key, $filepath);

        $user = auth()->user();
        $user->forceFill([
            'profile_photo_path' => $filepath
        ])->save();

        return Redirect::route('profile.show');
    }

    public function removeCoverPicture(Request $request) {
        $user = $request->user();

        $site = $user->site;
        $site->cover_photo_url = null;
        $site->save();

        return Redirect::route('dashboard');
    }
}
