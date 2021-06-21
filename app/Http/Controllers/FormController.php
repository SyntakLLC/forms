<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Option;
use App\Models\Question;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class FormController extends Controller
{

    function consoleLog($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('" . $output . "' );</script>";
    }

    public function index(Request $request) {
        $homeWorthIcon = Storage::url('marketing-photos/Home_Worth_Form_Icon.png');
        $apartmentIcon = Storage::url('marketing-photos/Apartment_Form_Icon.png');

        return Inertia::render('Forms/Index', [
            'forms' => $request->user()->forms,
            'homeWorthIcon' => $homeWorthIcon,
            'apartmentIcon' => $apartmentIcon,
        ]);
    }

    public function show(Form $form) {

//        $questions = $form->questions->toArray();
//        usort($questions, function($a, $b) {
//            $newA = json_decode(json_encode($a), TRUE);
//            $newB = json_decode(json_encode($b), TRUE);
//            return $newA['index'] < $newB['index'] ? -1 : ($newA['index'] == $newB['index'] ? 0 : 1);
//        });
//        $questions = collect($questions);
        $questions = $form->questions->sortBy('index')->values();
        $user = $form->user;

        return Inertia::render('Forms/Show', [
            'form' => $form,
            'site' => $user->site,
//            'user' => Auth::user(),
            'questionlist' => $questions,
            'options' => $questions->each(function ($question) {
                return $question->options;
            }),
        ]);
    }

    public function edit(Request $request, Form $form, Site $site, Question $question = null) {
        $ourQuestion = null;
        if ($question == null) {
            $ourQuestion = Form::findByUuid($form->uuid)->questions->sortBy('index')->first();
        } else {
            $ourQuestion = $question;
        }

        return Redirect::route('form.question.edit', [
            'form' => $form->uuid,
            'question' => $ourQuestion,
            'site' => $request->user()->site,
        ]);
    }

    public function create(Request $request) {
        return Inertia::render('Forms/Create', [
            'forms' => $request->user()->forms,
        ]);
    }

    public function update(Request $request) {
        $form = Form::find($request->get('form_id'));
        $form->title = $request->get('title');
        $form->save();
    }

    public function destroy(Request $request) {
        $form = Form::findByUuid($request->get('form_uuid'));
        $form->delete();

        return Redirect::route('dashboard');
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
                'type' => 'Name',
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
            'title' => "How Much is Your Home Worth?",
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
                'type' => 'Name',
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
                'title' => 'Now let\'s get to know your house a little better. Hit next to start filling out the basics of your home\'s address.',
                'tagline' => 'Thanks!',
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
                'title' => 'Alright, we\'re almost finished. ',
                'subtitle' => 'Just input some basic information about your home such as your number of beds and baths and we\'ll be in touch soon!',
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
                'index' => 14,
            ]),
        ];

        return Redirect::route('form.edit', $form->uuid);
    }

    public function apartment(Request $request) {
        $form = Form::create([
            'id_color' => $request->get('formColor'),
            'user_id' => $request->user()->id,
            'title' => "Are You Looking for an Apartment",
        ]);

        // num of beds
        $numOfBeds = Question::create([
            'form_id' => $form->id,
            'type' => 'Multiple Choice',
            'title' => 'How many bedrooms do you want?',
            'tagline' => 'Sounds good!',
            'index' => 4,
        ]);

        // the $numOfBeds questions
        Option::create([
            'question_id' => $numOfBeds->id,
            'title' => 'Studio',
            'index' => 0,
        ]);
        Option::create([
            'question_id' => $numOfBeds->id,
            'title' => '1 bed',
            'index' => 1,
        ]);
        Option::create([
            'question_id' => $numOfBeds->id,
            'title' => '2 beds',
            'index' => 2,
        ]);
        Option::create([
            'question_id' => $numOfBeds->id,
            'title' => '3+ beds',
            'index' => 3,
        ]);

        // laundry
        $laundry = Question::create([
            'form_id' => $form->id,
            'type' => 'Multiple Choice',
            'multiple' => true,
            'title' => 'Which laundry option do you prefer?',
            'index' => 5,
        ]);

        // the laundry options
        Option::create([
            'question_id' => $laundry->id,
            'title' => 'On-site laundry',
            'index' => 0,
        ]);
        Option::create([
            'question_id' => $laundry->id,
            'title' => 'In-unit laundry',
            'index' => 1,
        ]);
        Option::create([
            'question_id' => $laundry->id,
            'title' => 'Washer-dryer connections',
            'index' => 2,
        ]);

        // parking
        $parking = Question::create([
            'form_id' => $form->id,
            'type' => 'Multiple Choice',
            'multiple' => true,
            'title' => 'And what about parking options?',
            'index' => 6,
        ]);

        // the parking options
        Option::create([
            'question_id' => $parking->id,
            'title' => 'Garage',
            'index' => 0,
        ]);
        Option::create([
            'question_id' => $parking->id,
            'title' => 'Driveway',
            'index' => 1,
        ]);

        // pets
        $pets = Question::create([
            'form_id' => $form->id,
            'type' => 'Multiple Choice',
            'multiple' => true,
            'title' => 'Thanks! Now, do you have any pets?',
            'allow_other' => true,
            'index' => 7,
        ]);

        // the pets options
        Option::create([
            'question_id' => $pets->id,
            'title' => 'Dog',
            'index' => 0,
        ]);
        Option::create([
            'question_id' => $pets->id,
            'title' => 'Cat',
            'index' => 1,
        ]);

        // evicted?
        $evicted = Question::create([
            'form_id' => $form->id,
            'type' => 'Multiple Choice',
            'title' => 'Have you ever been evicted?',
            'index' => 8,
        ]);

        // the pets options
        Option::create([
            'question_id' => $evicted->id,
            'title' => 'Yes',
            'index' => 0,
        ]);
        Option::create([
            'question_id' => $evicted->id,
            'title' => 'No',
            'index' => 1,
        ]);

        // cosign
        $cosign = Question::create([
            'form_id' => $form->id,
            'type' => 'Multiple Choice',
            'title' => 'Are you signing the lease with anyone else?',
            'index' => 10,
        ]);

        // the cosign options
        Option::create([
            'question_id' => $cosign->id,
            'title' => 'A cosigner',
            'index' => 0,
        ]);
        Option::create([
            'question_id' => $cosign->id,
            'title' => 'Roommates, partner, etc.',
            'index' => 1,
        ]);
        Option::create([
            'question_id' => $cosign->id,
            'title' => 'Just me',
            'index' => 2,
        ]);

        // importance ranking
        $importance = Question::create([
            'form_id' => $form->id,
            'type' => 'Multiple Choice',
            'title' => 'Of these three, which is most important to you?',
            'index' => 11,
        ]);

        // the importance options
        Option::create([
            'question_id' => $importance->id,
            'title' => 'Lowest price',
            'index' => 0,
        ]);
        Option::create([
            'question_id' => $importance->id,
            'title' => 'Getting all my preferences',
            'index' => 1,
        ]);
        Option::create([
            'question_id' => $importance->id,
            'title' => 'Staying in the location I want',
            'index' => 2,
        ]);

        // move in date ranking
        $movein = Question::create([
            'form_id' => $form->id,
            'type' => 'Multiple Choice',
            'title' => 'How important is a move-in date to you?',
            'index' => 12,
        ]);

        // the movein options
        Option::create([
            'question_id' => $movein->id,
            'title' => 'I\'m just looking',
            'index' => 0,
        ]);
        Option::create([
            'question_id' => $movein->id,
            'title' => 'I want to move in, but no hurry',
            'index' => 1,
        ]);
        Option::create([
            'question_id' => $movein->id,
            'title' => 'I need to move, but I\'m flexible',
            'index' => 2,
        ]);
        Option::create([
            'question_id' => $movein->id,
            'title' => 'I need to move soon!',
            'index' => 3,
        ]);

        // monthlyincome ranking
        $monthlyincome = Question::create([
            'form_id' => $form->id,
            'type' => 'Multiple Choice',
            'title' => 'What\'s your monthly household income, pre-tax?',
            'index' => 15,
        ]);

        // the movein options
        Option::create([
            'question_id' => $monthlyincome->id,
            'title' => 'Under $3,000',
            'index' => 0,
        ]);
        Option::create([
            'question_id' => $monthlyincome->id,
            'title' => '$3,000-$9,000',
            'index' => 1,
        ]);
        Option::create([
            'question_id' => $monthlyincome->id,
            'title' => 'Over $10,000',
            'index' => 2,
        ]);

        $questions = [
            Question::create([
                'form_id' => $form->id,
                'type' => 'Name',
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
                'type' => 'Text',
                'title' => 'What are you looking to pay per month?',
                'index' => 3,
            ]),
            $numOfBeds,
            $laundry,
            $parking,
            $pets,
            $evicted,
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'How long do you want your lease to be?',
                'subtitle' => "(Approximately)",
                'index' => 9,
            ]),
            $cosign,
            $importance,
            $movein,
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'Is there any particular place you want to move in to?',
                'index' => 13,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'And about when would you want to move in?',
                'index' => 14,
            ]),
            $monthlyincome,
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'Anything else you want to have?',
                'subtitle' => 'Any "must-haves" like a dishwasher, patio, balcony, etc.?',
                'index' => 16,
            ]),
        ];

        return Redirect::route('form.edit', $form->uuid);
    }

    public function contact(Request $request) {
        $form = Form::create([
            'id_color' => $request->get('formColor'),
            'user_id' => $request->user()->id,
            'title' => "Contact Me!",
        ]);
        $questions = [
            Question::create([
                'form_id' => $form->id,
                'type' => 'Section Break',
                'title' => 'Contact Me!',
                'subtitle' => 'Feel free to ask me about anything!',
                'index' => 0,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Name',
                'title' => 'What is your full name?',
                'tagline' => 'Let\'s get acquainted',
                'index' => 1,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Email',
                'title' => 'Please provide your email.',
                'tagline' => 'Nice to meet you',
                'index' => 2,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Phone Number',
                'title' => 'What\'s your phone number?',
                'tagline' => 'One more bit of contact...',
                'index' => 3,
            ]),
            Question::create([
                'form_id' => $form->id,
                'type' => 'Text',
                'title' => 'So what did you want to talk about?',
                'tagline' => 'Great!',
                'subtitle' => 'The more specific, the better!',
                'index' => 4,
            ]),
        ];

        return Redirect::route('form.edit', $form->uuid);
    }

    public function buyingHome(Request $request) {
        $form = Form::create([
            'id_color' => $request->get('formColor'),
            'user_id' => $request->user()->id,
            'title' => "Are You Planning On Buying a Home?",
        ]);
        $questions = [
            Question::create([
                'form_id' => $form->id,
                'type' => 'Name',
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

    public function newAgent(Request $request) {
        $form = Form::create([
            'id_color' => $request->get('formColor'),
            'user_id' => $request->user()->id,
            'title' => "Do You Need a New Agent?",
        ]);
        $questions = [
            Question::create([
                'form_id' => $form->id,
                'type' => 'Name',
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
