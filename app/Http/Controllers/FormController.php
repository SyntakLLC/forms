<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FormController extends Controller
{
    public function index(Request $request) {
        return Inertia::render('Forms/Index');
//        return Inertia::render('Leads/Index', [
//            'leads' => $request->user()->forms,
//        ]);
    }

    public function show(Form $form) {
        return Inertia::render('Leads/Show', [
            'lead' => $form,
        ]);
    }

    public function create(Request $request) {
        return Inertia::render('Forms/Create');
    }

    public function store(Request $request) {

    }
}
