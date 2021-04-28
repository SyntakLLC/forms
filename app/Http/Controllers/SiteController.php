<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function updateMessage(Request $request) {
        $site = Site::find($request->get('site'));
        $site->message = $request->get('message');
        $site->save();
    }
}
