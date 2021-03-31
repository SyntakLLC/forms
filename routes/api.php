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
