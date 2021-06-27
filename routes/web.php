<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
URL::forceScheme('https');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\Controller@welcome')->name('welcome');

Route::get('/help', 'App\Http\Controllers\Controller@help')->name('help');

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

//    Route::get('/dashboard', function () {
//        return Inertia::render('Dashboard');
//    })->name('dashboard');
    Route::get('/dashboard', 'App\Http\Controllers\Controller@dashboard')->name('dashboard');


});

// the forms route:
Route::resource('form', 'App\Http\Controllers\FormController');
// properties
Route::resource('property', 'App\Http\Controllers\PropertyController');

// when filtering leads by only one form
//Route::get('response/{form}', 'App\Http\Controllers\LeadController@filter')->name('response.filter');

// the leads controller
Route::resource('response', 'App\Http\Controllers\LeadController');

// when creating a new form, we have 4 different vue forms as options
Route::post('form/custom', 'App\Http\Controllers\FormController@custom');
Route::post('form/home_worth', 'App\Http\Controllers\FormController@homeWorth');
Route::post('form/apartment', 'App\Http\Controllers\FormController@apartment');
Route::post('form/new-agent', 'App\Http\Controllers\FormController@newAgent');
Route::post('form/buying-home', 'App\Http\Controllers\FormController@buyingHome');
Route::post('form/contact-me', 'App\Http\Controllers\FormController@contact');

// when adding a question, we have 5 different vue forms as options
Route::post('form/add_name', 'App\Http\Controllers\QuestionController@addName');
Route::post('form/add_text', 'App\Http\Controllers\QuestionController@addText');
Route::post('form/add_email', 'App\Http\Controllers\QuestionController@addEmail');
Route::post('form/add_phone', 'App\Http\Controllers\QuestionController@addPhone');
Route::post('form/add_multiple_choice', 'App\Http\Controllers\QuestionController@addMultipleChoice');
Route::post('form/add_section_break', 'App\Http\Controllers\QuestionController@addSectionBreak');

// when submitting results from the typeform
Route::post('form/submit_results', 'App\Http\Controllers\ResponseController@store');

// to update the tagline
Route::post('form/update_tagline', 'App\Http\Controllers\QuestionController@update');

// when adding an option
Route::post('form/add_option', 'App\Http\Controllers\QuestionController@addOption');

// when deleting a question, it's a web route so we can redirect to the prior question
Route::post('form/delete-question', 'App\Http\Controllers\QuestionController@destroy');

// the route that allows us to edit a single question while seeing all of them
Route::get('form/{form}/edit/{question}', 'App\Http\Controllers\QuestionController@edit')->name('form.question.edit');

// adds an option to the multiple choice question
//Route::post('form/add_option', 'App\Http\Controllers\QuestionController@addOption');

// add a cover photo
Route::post('update-cover-picture','App\Http\Controllers\Controller@updateCoverPicture');

// update the profile photo
Route::post('update-profile-picture','App\Http\Controllers\Controller@updateProfilePicture');

// remove a cover photo
Route::post('remove-cover-picture','App\Http\Controllers\Controller@removeCoverPicture');

// update the property photo
Route::post('update-property-picture','App\Http\Controllers\PropertyController@updatePropertyPicture');

// remove a property photo
Route::post('remove-property-picture','App\Http\Controllers\PropertyController@removePropertyPicture');

// this is the final page
Route::get('{site}', 'App\Http\Controllers\SiteController@show')->name('site.show');

// submits the contact form as a new lead
Route::post('contact', 'App\Http\Controllers\ResponseController@contact');

// updates the three social media links
Route::post('update-social', 'App\Http\Controllers\SiteController@updateSocial');

// to delete a form
Route::post('delete-form', 'App\Http\Controllers\FormController@destroy');

// initialize a site
Route::post('create-site', 'App\Http\Controllers\SiteController@create');

// to change the domain name
Route::post('tryToUpdateDomain/{site}', 'App\Http\Controllers\SiteController@tryToUpdateDomain')->name('site.slug.update');
