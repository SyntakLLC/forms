<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LeadController extends Controller
{
    public function index(Request $request) {
        return Inertia::render('Leads/Index', [
            'leads' => $request->user()->leads,
            'forms' => $request->user()->forms,
        ]);
    }

    public function show(Lead $response) {
        $response->viewed = true;
        $response->save();

        return Inertia::render('Leads/Show', [
            'lead' => $response,
            'responses' => $response->responses,
            'forms' => Auth::user()->forms,
        ]);
    }
}
