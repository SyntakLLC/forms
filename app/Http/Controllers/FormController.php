<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class FormController extends Controller
{
    public function index(Request $request) {
        return Inertia::render('Forms/Index', [
            'forms' => $request->user()->forms,
        ]);
    }

    public function show(Form $form) {
        return Inertia::render('Leads/Show', [
            'lead' => $form,
        ]);
    }

    public function edit(Form $form) {

        return Inertia::render('Forms/Edit', [
            'form' => $form,
            'questions' => Form::findByUuid($form->uuid)->questions,
        ]);
    }

    public function create(Request $request) {
        return Inertia::render('Forms/Create');
    }

    public function custom(Request $request) {
        $form = Form::create([
//            'user_id' => $request->get('user_id'),
            'user_id' => $request->user()->id,
            'title' => "Untitled Form",
        ]);
        $questions = [
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'What is your full name?',
                'tagline' => 'Let\'s get acquainted',
                'index' => 0,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Email',
                'title' => 'Please provide your email.',
                'tagline' => 'Nice to meet you',
                'index' => 1,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Phone Number',
                'title' => 'What\'s your phone number?',
                'tagline' => 'One more bit of contact...',
                'index' => 2,
            ]),
        ];

        return Redirect::route('form.edit', $form->uuid);
    }
}
