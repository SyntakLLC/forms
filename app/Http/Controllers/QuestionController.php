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
    public function addName(StoreQuestionRequest $request) {
        $question = Question::create([
            'form_id' => $request->get('form_id'),
            'type' => 'Name',
            'title' => 'What is your full name?',
            'tagline' => "Hi! Let's get acquainted",
            'index' => $request->get('index'),
        ]);

        return Redirect::route('form.edit', $request->get('form_uuid'));
    }

    public function addText(StoreQuestionRequest $request) {
        $question = Question::create([
            'form_id' => $request->get('form_id'),
            'type' => 'Text',
            'title' => "",
            'index' => $request->get('index'),
        ]);

        return Redirect::route('form.question.edit', [
            'form' => $request->get('form_uuid'),
            'question' => $question->uuid,
        ]);
    }

    public function addSectionBreak(StoreQuestionRequest $request) {
        $question = Question::create([
            'form_id' => $request->get('form_id'),
            'type' => 'Section Break',
            'title' => "",
            'index' => $request->get('index'),
        ]);

        return Redirect::route('form.question.edit', [
            'form' => $request->get('form_uuid'),
            'question' => $question->uuid,
        ]);
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

        return Redirect::route('form.question.edit', [
            'form' => $request->get('form_uuid'),
            'question' => $question->uuid,
        ]);
    }

    public function addEmail(StoreQuestionRequest $request) {
        $question = Question::create([
            'form_id' => $request->get('form_id'),
            'type' => 'Email',
            'title' => "Please provide your email.",
            'tagline' => 'Nice to meet you',
            'index' => $request->get('index'),
        ]);

        return Redirect::route('form.question.edit', [
            'form' => $request->get('form_uuid'),
            'question' => $question->uuid,
        ]);
    }

    public function addPhone(StoreQuestionRequest $request) {
        $question = Question::create([
            'form_id' => $request->get('form_id'),
            'type' => 'Phone Number',
            'title' => "What's your phone number?",
            'tagline' => 'One more bit of contact...',
            'index' => $request->get('index'),
        ]);

        return Redirect::route('form.question.edit', [
            'form' => $request->get('form_uuid'),
            'question' => $question->uuid,
        ]);
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

        function cmp($a, $b) {
            return $a->index < $b->index;
        }

        $questions = Form::findByUuid($form->uuid)->questions->toArray();
        usort($questions, function($a, $b) {
            $newA = json_decode(json_encode($a), TRUE);
            $newB = json_decode(json_encode($b), TRUE);
            return $newA['index'] < $newB['index'] ? -1 : ($newA['index'] == $newB['index'] ? 0 : 1);
        });

        if (!in_array(Question::findByUuid($question), $questions)) {
//            $questions = array_push($questions, Question::findByUuid($question));
        }
        $questionsaaa = $form->questions->sortBy('index')->values();

        return Inertia::render('Forms/EditSingle', [
            'form' => $form,
            'questionlist' => $questionsaaa,
            'options' => $questionsaaa->each(function ($question) {
                return $question->options;
            }),
            'user' => $request->user(),
            'questions' => $questions,
            'options' => $question == null ? Form::findByUuid($form->uuid)->questions->first()->options : $question->options,
            'forms' => Auth::user()->forms,
            'site' => Auth::user()->site,
            'question' => $question == null ? Form::findByUuid($form->uuid)->questions->first() : $question,
        ]);
    }

    function consoleLog($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('" . $output . "' );</script>";
    }

    public function update(Request $request)
    {
        $question = Question::find($request->get('question_id'));

        if ($request->get('type') == 'tagline') {
            $question->tagline = $request->get('tagline');
        }
        if ($request->get('type') == 'title') {
            $question->title = $request->get('title');
        }
        if ($request->get('type') == 'subtitle') {
            $question->subtitle = $request->get('subtitle');
        }
//        $question->tagline = $request->get('tagline');

        $question->save();

        return Redirect::route('form.question.edit', [
            'form' => Form::find($request->get('form_id')),
            'question' => Question::find($request->get('question_id')),
        ]);
    }

    public function addOption(Request $request) {
        $this->consoleLog($request->get('question_id'));
        $question = Question::find($request->question_id);
        $form = Form::find($request->form_id);

        $option = Option::create([
            'question_id' => $request->question_id,
            'title' => "",
            'index' => $request->index,
        ]);

        return Redirect::route('form.question.edit', [
            'form' => $form,
            'question' => $question,
        ]);
    }

    public function destroy(Request $request)
    {
        $form = Form::findByUuid($request->get('form_uuid'));
        $questions = $form->questions;
        $deletedIndex = $questions->search(function($question) use ($request) {
            return $question->uuid === $request->get('deletedUUID');
        });

        $deletedQuestion = Question::findByUuid($request->get('deletedUUID'));

        $redirectToQuestion = $questions->first();
        $zeroQuestion = $questions->first();

        foreach($questions as $question) {
            if ($question['index'] == 0) {
                $zeroQuestion = $question;
            }

            if ($question['index'] == ($deletedQuestion['index'] - 1)) {
                $redirectToQuestion = $question;
            }

            if ($question['index'] > $deletedQuestion['index']) {
                $question['index'] = $question['index'] - 1;
                $question->save();
            }
        }

        if ($redirectToQuestion == null) {
            $redirectToQuestion = $zeroQuestion;
        }

        $deletedQuestion->delete();

        return Redirect::route('form.question.edit', [
            'form' => $request->get('form_uuid'),
            'question' => $redirectToQuestion->uuid,
        ]);
//        return Redirect::route('form.edit', $request->get('form_uuid'));
//        return Redirect::back()->with('message','Successfully deleted!');
    }

    public function up(Request $request) {

        $form = Form::findByUuid($request->get('form_uuid'));
        $questions = $form->questions;
        $toMoveUpIndex = $request->get('currentIndex');
        $previousIndex = $request->get('previousIndex');
//
        $toMoveUpQuestion = null;
        foreach($questions as $question) {
            if ($toMoveUpIndex == $question['index']) {
                $toMoveUpQuestion = $question;
                break;
            }
        }
        $previousQuestion = null;
        foreach($questions as $question) {
            if ($previousIndex == $question['index']) {
                $previousQuestion = $question;
                break;
            }
        }
//
        $toMoveUpQuestion->index = $request->get('previousIndex');
        $previousQuestion->index = $request->get('currentIndex');
//
        $toMoveUpQuestion->save();
        $previousQuestion->save();
    }

    public function down(Request $request) {

        $form = Form::findByUuid($request->get('form_uuid'));
        $questions = $form->questions;
        $currentIndex = $request->get('currentIndex');
        $nextIndex = $request->get('nextIndex');

        $currentQuestion = null;
        foreach($questions as $question) {
            if ($currentIndex == $question['index']) {
                $currentQuestion = $question;
                break;
            }
        }
        $nextQuestion = null;
        foreach($questions as $question) {
            if ($nextIndex == $question['index']) {
                $nextQuestion = $question;
                break;
            }
        }

        $currentQuestion->index = $request->get('nextIndex');
        $nextQuestion->index = $request->get('currentIndex');

        $currentQuestion->save();
        $nextQuestion->save();
    }
}
