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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
Route::get ('country' ,      'Country\CountryController@country');
Route::get ('country/{id}' , 'Country\CountryController@findCountryById');
Route::post('country' ,      'Country\CountryController@addCountry');
Route::put ('country/{id}' , 'Country\CountryController@updateCountry');
Route::delete('country/{id}' , 'Country\CountryController@deleteCountryById');
 */

Route::apiResource('country' , 'Country\Country');


