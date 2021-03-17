<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified', 'subscribed'])->group(function() {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');


});

// the forms route:
Route::resource('form', 'App\Http\Controllers\FormController');

// the leads controller
Route::resource('response', 'App\Http\Controllers\LeadController');

// when creating a new form, we have 4 different vue forms as options
Route::post('form/custom', 'App\Http\Controllers\FormController@custom');
Route::post('form/home_worth', 'App\Http\Controllers\FormController@homeWorth');
Route::post('form/apartment', 'App\Http\Controllers\FormController@apartment');
Route::post('form/buy_home', 'App\Http\Controllers\FormController@buyHome');

// when adding a question, we have 5 different vue forms as options
Route::post('form/add_text', 'App\Http\Controllers\QuestionController@addText');
Route::post('form/add_email', 'App\Http\Controllers\QuestionController@addEmail');
Route::post('form/add_phone', 'App\Http\Controllers\QuestionController@addPhone');
Route::post('form/add_multiple_choice', 'App\Http\Controllers\QuestionController@addMultipleChoice');
Route::post('form/add_section_break', 'App\Http\Controllers\QuestionController@addSectionBreak');

// when deleting a question
Route::post('form/delete_question', 'App\Http\Controllers\QuestionController@destroy');

// when adding an option
Route::post('form/add_option', 'App\Http\Controllers\QuestionController@store');
