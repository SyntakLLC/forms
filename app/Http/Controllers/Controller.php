<?php

namespace App\Http\Controllers;

use App\Models\Form;
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
use phpDocumentor\Reflection\Types\Boolean;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function welcome(Request $request) {

        $whatsDifferent = Storage::url('marketing-photos/what\'s_different_newpage.png');
        $usableAnywhere = Storage::url('marketing-photos/usable_anywhere_newpage.png');
        $leads = Storage::url('marketing-photos/leads_newpage.png');

        $davidTran = Storage::url('marketing-photos/david_tran.jpg');
        $chrisWhalen = Storage::url('marketing-photos/ chris_whalen.jpg');

        return Inertia::render('Welcome', [
            'leads' => $leads,
            'usableAnywhere' => $usableAnywhere,
            'whatsDifferent' => $whatsDifferent,
            'davidTran' => $davidTran,
            'chrisWhalen' => $chrisWhalen,
        ]);
    }

    public function dashboard(Request $request, Site $site) {
        $logoImageURL = Storage::url('marketing-photos/Aboutcontact Logo Image.png');
        $logoTextURL = Storage::url('marketing-photos/Aboutcontact Logo Text.png');

        $standard = Storage::url('marketing-photos/Standard.png');
        $mobileProfile = Storage::url('marketing-photos/Mobile_Profile.png');
        $brandedLeft = Storage::url('marketing-photos/Brand_Left.png');
        $brandedRight = Storage::url('marketing-photos/Brand_Right.png');
        $minimalist = Storage::url('marketing-photos/Minimalist.png');

        $site = Site::findByUuid($request->user()->site->uuid);

        return Inertia::render('Dashboard', [
            'forms' => $request->user()->forms,
            'properties' => $request->user()->properties,
            'user' => $request->user(),
            'leads' => $request->user()->leads,
            'site' => $site,
            'logoImageURL' => $logoImageURL,
            'logoTextURL' => $logoTextURL,
            'standard' => $standard,
            'mobileProfile' => $mobileProfile,
            'brandedLeft' => $brandedLeft,
            'brandedRight' => $brandedRight,
            'minimalist' => $minimalist,
            'onTrial' => $request->user()->onTrial(),
            'subscribed' => $request->user()->subscribed(),
            'justInitialized' => $request->new_site,
        ]);
    }

    public function help(Request $request) {
        return Inertia::render('Help');
    }

    public function updateCoverPicture(Request $request) {
        $filepath = 'cover-photos/' . $request->uuid . '.' . $request->extension;
        Storage::move($request->key, $filepath);

        $form = Form::findByUuid($request->form);

        $form->cover_photo_url = $filepath;
        $form->save();

        return Redirect::route('form.edit', $form->uuid);
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
