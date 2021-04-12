<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Form;
use App\Models\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LeadController extends Controller
{
    public function index(Request $request) {
        return Inertia::render('Leads/Index', [
            'leads' => $request->user()->leads,
            'formsFilled' => $request->user()->leads->map(function ($lead) {
                return Form::findByUuid($lead->form_filled);
            }),
            'responses' => $request->user()->leads->map(function ($lead) {
                return $lead->responses;
            }),
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

    public function filter(Request $request, Form $form) {
        $leads = $request->user()->leads;
        if (!is_array($leads)) {
            $leads = [$leads];
        }

        $formUUID = $form->uuid;

        $filteredLeads = collect(array_filter($leads, function ($lead) use ($formUUID) {
            $this->consoleLog($formUUID);
            $this->consoleLog($lead[0]);
            $newLead = $lead[0];
            $this->consoleLog($newLead);
            return $newLead->form_filled===$formUUID;
        }));

        return Inertia::render('Leads/FilteredIndex', [
            'leads' => $filteredLeads,
            'formsFilled' => $filteredLeads->map(function ($lead) {
                return Form::findByUuid($lead->form_filled);
            }),
            'responses' => $filteredLeads->map(function ($lead) {
                return $lead->responses;
            }),
            'forms' => $request->user()->forms,
        ]);
    }

    function consoleLog($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('" . $output . "' );</script>";
    }
}
