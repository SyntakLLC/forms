<?php

namespace App\Http\Controllers;

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
        $site->initialized = true;
        $site->save();

        return Redirect::route('dashboard');
    }

    public function show(Request $request, Site $site) {
        $user = User::findByUuid($site->user_id);

        return Inertia::render('Show', [
            'site' => $site,
            'user' => $user,
            'forms' => $user->forms,
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
