<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class QuestionController extends Controller
{
    public function addText(StoreQuestionRequest $request) {
        $question = Question::create([
            'form_id' => $request->get('form_id'),
            'type' => 'Text',
            'title' => "",
//            'tagline' => 'One more bit of contact...',
            'index' => $request->get('index'),
        ]);

        return Redirect::route('form.edit', $request->get('form_uuid'));
    }

    public function addSectionBreak(StoreQuestionRequest $request) {
        $question = Question::create([
            'form_id' => $request->get('form_id'),
            'type' => 'Section Break',
            'title' => "",
            'index' => $request->get('index'),
        ]);

        return Redirect::route('form.edit', $request->get('form_uuid'));
    }

    public function addMultipleChoice(StoreQuestionRequest $request) {
        $question = Question::create([
            'form_id' => $request->get('form_id'),
            'type' => 'Multiple Choice',
            'title' => "",
            'index' => $request->get('index'),
        ]);

        Option::create([
            'question_id' => $question->id,
            'title' => "",
            'index' => 0,
        ]);

        Option::create([
            'question_id' => $question->id,
            'title' => "",
            'index' => 1,
        ]);

        return Redirect::route('form.edit', $request->get('form_uuid'));
    }

    public function addEmail(StoreQuestionRequest $request) {
        $question = Question::create([
            'form_id' => $request->get('form_id'),
            'type' => 'Email',
            'title' => "Please provide your email.",
            'tagline' => 'Nice to meet you',
            'index' => $request->get('index'),
        ]);

        return Redirect::route('form.edit', $request->get('form_uuid'));
    }

    public function addPhone(StoreQuestionRequest $request) {
        $question = Question::create([
            'form_id' => $request->get('form_id'),
            'type' => 'Phone Number',
            'title' => "What's your phone number?",
            'tagline' => 'One more bit of contact...',
            'index' => $request->get('index'),
        ]);

        return Redirect::route('form.edit', $request->get('form_uuid'));
    }


    public function store(Request $request)
    {
        Option::create([
            'question_id' => $request->get('question_id'),
            'title' => "",
            'index' => $request->get('index'),
        ]);

        return Redirect::route('form.edit', $request->get('form_uuid'));
    }


    public function edit(Request $request, Form $form, Question $question)
    {
        return Inertia::render('Forms/EditSingle', [
            'form' => $form,
            'questions' => Form::findByUuid($form->uuid)->questions->sortBy('index'),
            'options' => $question == null ? Form::findByUuid($form->uuid)->questions->first()->options : $question->options,
            'forms' => Auth::user()->forms,
            'question' => $question == null ? Form::findByUuid($form->uuid)->questions->first() : $question,
        ]);
    }


    public function destroy(Request $request)
    {
        Question::findByUuid($request->get('deletedUUID'))->delete();

        return Redirect::route('form.edit', $request->get('form_uuid'));
    }
}
