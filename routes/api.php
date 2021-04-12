<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * The url will be example.com/api/api-example
 */

Route::get('api-example','\App\Http\Controllers\Api\ApiExampleController@get');

// the Update form question
Route::post('update-form-question','App\Http\Controllers\QuestionController@update');

// the Updating Title
Route::post('update-title','App\Http\Controllers\FormController@update');

// the Updating Message
Route::post('update-message','App\Http\Controllers\Controller@updateMessage');

// to delete a question delete-question
Route::post('delete-question', 'App\Http\Controllers\QuestionController@destroy');

// to move a question up
Route::post('move-up', 'App\Http\Controllers\QuestionController@moveup');
