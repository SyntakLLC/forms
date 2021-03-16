<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionRequest;
use Illuminate\Support\Facades\Redirect;

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


    public function destroy(Request $request)
    {
        Question::findByUuid($request->get('deletedUUID'))->delete();

        return Redirect::route('form.edit', $request->get('form_uuid'));
    }
}
