<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('report', 'MeetingController@showReport');
Route::get('view', 'MeetingController@createPDF');
Route::get('createmeeting', 'MeetingController@create')->name('meeting.create');
Route::post('createmeeting', 'MeetingController@store')->name('meeting.store');
Route::get('createroom', 'RoomController@create')->name('room.create');
Route::post('createroom', 'RoomController@store')->name('room.store');
Route::get('createbooking', 'BookingController@create')->name('booking.create');
Route::post('createbooking', 'BookingController@store')->name('booking.store');

Route::group([
	'prefix' => 'admin',
	'middleware' => 'auth:admin',
],  function () {
	Route::group([
		'prefix' => 'user',
	], function (){
		Route::get('all', 'Admin\UserController@index')->name('index');
		Route::get('create', 'Admin\UserController@create')->name('create');
		Route::post('create', 'Admin\UserController@store')->name('admin.user.store');
		Route::get('show/{user}', 'Admin\UserController@show')->name('show');
		Route::get('edit/{user}', 'Admin\UserController@edit')->name('edit');
		Route::post('update/{user}', 'Admin\UserController@update')->name('update');
		Route::get('delete', 'Admin\UserController@delete')->name('delete');
	});

});

// admin routes
  // group - users
	// - routes

  // meeting
     // -route