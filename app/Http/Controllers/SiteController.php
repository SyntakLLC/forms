<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function updateMessage(Request $request) {
        $site = Site::find($request->get('site'));
        $site->message = $request->get('message');
        $site->save();
    }

    public function updateColor(Request $request) {
        $site = Site::find($request->get('site'));
        $site->accent_color = $request->get('color');
        $site->save();
    }
    function consoleLog($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('" . $output . "' );</script>";
    }
}
