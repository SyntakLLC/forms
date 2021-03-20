<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    public function submitResults(Request $request) {
        $lead = Lead::create([
            'user_id' => Auth::user()->id,
            'first' => $request,
        ]);
    }
}
