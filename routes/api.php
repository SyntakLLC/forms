<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

URL::forceScheme('https');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

/*
 * The url will be example.com/api/api-example
 */

// the Updating Message
Route::post('update-message','App\Http\Controllers\SiteController@updateMessage');

// the Updating Content
Route::post('update-content','App\Http\Controllers\SiteController@updateContent');

// the Updating Title
Route::post('update-section-header','App\Http\Controllers\SiteController@updateTitle');

// the Updating Accent Color
Route::post('update-color','App\Http\Controllers\SiteController@updateColor');

// the Updating Layout
Route::post('update-layout','App\Http\Controllers\SiteController@updateLayout');

// the Updating Profile Picture
Route::post('update-cover-picture','App\Http\Controllers\Controller@updateCoverPicture');

// the Update form question
Route::post('update-form-question','App\Http\Controllers\QuestionController@update');

// the Update option
Route::post('update-option','App\Http\Controllers\OptionController@update');

// the Updating Title
Route::post('update-title','App\Http\Controllers\FormController@update');

// to delete a form
//Route::post('delete-form', 'App\Http\Controllers\FormController@destroy');

// to delete a question delete-question
Route::post('delete-question', 'App\Http\Controllers\QuestionController@destroy');

// to delete an option
Route::post('delete-option', 'App\Http\Controllers\OptionController@destroy');

// to move a question up
Route::post('move-up', 'App\Http\Controllers\QuestionController@up');

// to move a question down
Route::post('move-down', 'App\Http\Controllers\QuestionController@down');

// stops showing the site notification
Route::post('dontshowsitenotif', 'App\Http\Controllers\SiteController@dontshowsitenotif');

// stops showing the form notification
Route::post('dontshowformnotif', 'App\Http\Controllers\SiteController@dontshowformnotif');

// to change the domain name
Route::post('tryToUpdateDomain', 'App\Http\Controllers\SiteController@tryToUpdateDomain');

// updating the property page
Route::post('update-town-and-state', 'App\Http\Controllers\PropertyController@updateTownAndState');
Route::post('update-street-address', 'App\Http\Controllers\PropertyController@updateStreetAddress');
Route::post('update-bed', 'App\Http\Controllers\PropertyController@updateBed');
Route::post('update-bath', 'App\Http\Controllers\PropertyController@updateBath');
Route::post('update-square-feet', 'App\Http\Controllers\PropertyController@updateSquareFeet');
Route::post('update-description', 'App\Http\Controllers\PropertyController@updateDescription');
