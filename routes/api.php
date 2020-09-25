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
Route::get('allbookig', 'BookingController@index');
Route::get('status/{room}', 'BookingController@getStatus');
Route::post('storebooking', 'BookingController@store');
Route::post('allrooms', 'RoomController@index');
Route::post('createroom', 'RoomController@store');
Route::get('allmeeting', 'MeetingController@index');
Route::post('createmeeting', 'MeetingController@store');
Route::get('colaborators', 'CollaboratorsController@index');  

Route::get('browse', 'RoomController@browse');
Route::get('report', 'MeetingController@showReport');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
