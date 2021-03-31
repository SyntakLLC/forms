<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Lead;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ResponseController extends Controller
{
    public function store(Request $request) {
        $lead = Lead::create([
            'user_id' => Auth::user()->id,
            'first' => $request[1]['answer'],
            'last' => "",
            'email' => $request[2]['answer'],
            'form_filled' => $request[0]['form_id'],
        ]);

        foreach ($request->all() as $key=>$value) {
            if ($key !== 0) {
                Response::create([
                    'lead_id' => $lead->id,
                    'question' => $value['question'],
                    'response' => $value['answer'],
                    'index' => $key,
                ]);
            }
        }


        return Redirect::route('dashboard');
    }
}
