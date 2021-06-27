<?php

namespace App\Http\Controllers;

use App\Http\Requests\Site\UpdateSiteSlugRequest;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SiteController extends Controller
{
    public function create(Request $request) {
        $site = Site::findByUuid($request->get('site'));
        $site->layout = $request->get('layout');
        if ($request->get('layout') === 4) {
            $site->accent_color = 'F1E7DF';
        }
//        $site->first_time_saw_site = true;
        $site->initialized = true;
        $site->save();

        return Redirect::route('dashboard', [
            'new_site' => true,
        ]);
    }

    public function updateSocial(Request $request) {
        $site = Site::findByUuid($request->site);
        $site->facebook = $request->facebook;
        $site->instagram = $request->instagram;
        $site->twitter = $request->twitter;
        $site->save();

        return Redirect::route('dashboard');
    }

    public function dontshowsitenotif(Request $request) {
        $site = Site::findByUuid($request->site);
        $site->saw_autosave_message_on_site = true;
        $site->save();
    }

    public function dontshowformnotif(Request $request) {
        $site = Site::findByUuid($request->site);
        $site->saw_autosave_message_on_form = true;
        $site->save();
    }

    public function tryToUpdateDomain(UpdateSiteSlugRequest $request, Site $site) {
        $site->slug = $request->input('slug');
        $site->save();

        return Redirect::route('dashboard');
    }

    public function show(Request $request, Site $site) {
        $user = User::findByUuid($site->user_id);

        return Inertia::render('Show', [
            'site' => $site,
            'profile_photo_url' => $user->profile_photo_url,
            'name' => $user->name,
            'forms' => $user->forms,
            'email' => $user->email,
            'onTrial' => $user->onTrial(),
            'subscribed' => $user->subscribed(),
        ]);
    }

    public function updateMessage(Request $request) {
        $site = Site::find($request->get('site'));
        $site->message = $request->get('message');
        $site->save();
    }

    public function updateContent(Request $request) {
        $site = Site::find($request->get('site'));
        $site->section_content = $request->get('content');
        $site->save();
    }

    public function updateTitle(Request $request) {
        $site = Site::find($request->get('site'));
        $site->section_header = $request->get('title');
        $site->save();
    }

    public function updateColor(Request $request) {
        $site = Site::find($request->get('site'));
        $site->accent_color = $request->get('color');
        $site->save();
    }

    public function updateLayout(Request $request) {
        $site = Site::find($request->get('site'));
        $site->layout = $request->get('layout');
        $site->save();
    }

    function consoleLog($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('" . $output . "' );</script>";
    }
}
