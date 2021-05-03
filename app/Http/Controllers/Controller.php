<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
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
        $path = $request->file('photo')->store('cover-photos');

        return $path;
    }
}
