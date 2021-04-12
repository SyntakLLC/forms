<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard(Request $request) {

        return Inertia::render('Dashboard', [
            'forms' => $request->user()->forms,
            'user' => $request->user(),
        ]);
    }

    public function updateMessage(Request $request) {
        $user_id = $request->user()->id;
        echo "<script>console.log('ss');</script>";
        $user = User::findOrFail($user_id);

        $user->message = "amaan";

        $user->save();
//        $user->message = $request->get('message');
//        $user->message = "djdd";
//        $user->save();
    }
}
