<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'forms' => Auth::user()->forms,
        ]);
    }

    public function edit(Form $form) {

//        return Inertia::render('Forms/EditSingle', [
//            'form' => $form,
//            'questions' => Form::findByUuid($form->uuid)->questions->sortBy('index'),
//            'options' => Form::findByUuid($form->uuid)->questions->sortBy('index')->each(function ($question) {
//                return $question->options;
//            })->sortBy('index'),
//            'forms' => Auth::user()->forms,
//        ]);

        return Redirect::route('form.question.edit', [
            'form' => $form->uuid,
            'question' => Form::findByUuid($form->uuid)->questions->sortBy('index')->first()
        ]);
    }

    public function create(Request $request) {
        return Inertia::render('Forms/Create', [
            'forms' => $request->user()->forms,
        ]);
    }

    public function custom(Request $request) {
        $form = Form::create([
            'id_color' => $request->get('formColor'),
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

    public function homeWorth(Request $request) {
        $form = Form::create([
            'id_color' => $request->get('formColor'),
            'user_id' => $request->user()->id,
            'title' => "How Much is my Home Worth?",
        ]);
        $propertyMC = Question::create([
            'form_id' => $form->id,
            'type' => 'Multiple Choice',
            'title' => 'What type of property do you have?',
            'index' => 12,
        ]);
        $timeToSellMC = Question::create([
            'form_id' => $form->id,
            'type' => 'Multiple Choice',
            'title' => 'When do you plan to sell?',
            'index' => 13,
        ]);

        // the options for propertyMC
        Option::create([
            'question_id' => $propertyMC->id,
            'title' => 'House',
            'index' => 0,
        ]);
        Option::create([
            'question_id' => $propertyMC->id,
            'title' => 'Condo',
            'index' => 1,
        ]);
        Option::create([
            'question_id' => $propertyMC->id,
            'title' => 'Townhouse',
            'index' => 2,
        ]);
        Option::create([
            'question_id' => $propertyMC->id,
            'title' => 'Other',
            'index' => 3,
        ]);

        // the options for timeToSellMC
        Option::create([
            'question_id' => $timeToSellMC->id,
            'title' => '3 months',
            'index' => 0,
        ]);
        Option::create([
            'question_id' => $timeToSellMC->id,
            'title' => '6 months',
            'index' => 1,
        ]);
        Option::create([
            'question_id' => $timeToSellMC->id,
            'title' => '1 year',
            'index' => 2,
        ]);
        Option::create([
            'question_id' => $timeToSellMC->id,
            'title' => 'More than 1 year',
            'index' => 3,
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
            Question::create([
                'form_id' => $form->id,
                'type' => 'Section Break',
                'title' => '',
                'content' => 'Thanks! Now let\'s get to know your house a little better. Hit next to start filling out the basics of your home\'s address.',
                'index' => 3,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'What is your street address?',
                'tagline' => 'Thanks!',
                'index' => 4,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'And what city or town are you in?',
                'tagline' => 'Great!',
                'index' => 5,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'Which state?',
                'index' => 6,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'And zip code?',
                'tagline' => 'Almost done with address information!',
                'index' => 7,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Section Break',
                'title' => '',
                'content' => 'Alright, we\'re almost finished. Just input some basic information about your home such as your number of beds and baths and we\'ll be in touch soon!',
                'index' => 8,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'Number of bedrooms',
                'index' => 9,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'Number of bathrooms',
                'index' => 10,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'How many square feet is your house?',
                'description' => 'You can be approximate with this.',
                'index' => 11,
            ]),
            $propertyMC,
            $timeToSellMC,
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'Do you have any comments, questions, or concerns?',
                'tagline' => 'You made it!',
                'index' => 3,
            ]),
        ];

        return Redirect::route('form.edit', $form->uuid);
    }
}

function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}
