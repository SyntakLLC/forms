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
            'first' => $request[0]['answer'],
            'last' => "",
            'email' => $request[1]['answer'],
            'form_filled' => "Untitled Form",
        ]);

        foreach ($request->all() as $key=>$value) {

            Response::create([
                'lead_id' => $lead->id,
                'question' => $value['question'],
                'response' => $value['answer'],
                'index' => $key,
            ]);
        }


        return Redirect::route('dashboard');
    }
}
