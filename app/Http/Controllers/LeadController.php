<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LeadController extends Controller
{
    public function index(Request $request) {
        return Inertia::render('Leads/Index', [
            'leads' => $request->user()->leads,
        ]);
    }

    public function show(Lead $response) {
        $response->viewed = true;
        $response->save();

        return Inertia::render('Leads/Show', [
            'lead' => $response,
            'responses' => $response->responses,
        ]);
    }
}
