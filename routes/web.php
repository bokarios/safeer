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

/* Home Route */

Route::get('/', 'PagesController@index');
/* Add Admins Route */
Route::post('/admins/add', 'AdminsController@store');
/* Add Tripes Route */
Route::post('/tripes/add', 'TripesController@store');
/* Add Static Tripes Route */
Route::post('/static/add', 'StaticTripesController@store');

/* Edit Reservations Route */
Route::get('/reservations/{id}/edit', 'ReservationsController@edit');
Route::post('/reservations/{id}/edit', 'ReservationsController@update');
/* Edit Tripes Route */
Route::get('/tripes/{id}/edit', 'TripesController@edit');
Route::post('/tripes/{id}/edit', 'TripesController@update');
/* Edit Delayed Reservations Route */
Route::get('/delayed/{id}/edit', 'DelayedReservationsController@edit');
Route::post('/delayed/{id}/edit', 'DelayedReservationsController@update');

/* Delete Reservations Route */
Route::get('/reservations/{id}/delete', 'ReservationsController@destroy');
/* Delete Tripes Route */
Route::get('/tripes/{id}/delete', 'TripesController@destroy');
/* Delete Reservations Route */
Route::get('/delayed/{id}/delete', 'DelayedReservationsController@destroy');

/* Refresh Reservations Route */
Route::post('/reservations/refresh', 'AdminsController@reservationsRefresh');

/* Search Reservations Route */
Route::post('/resv/search', 'AdminsController@reservationsSearch');

/* Refresh Delayed Reservations Route */
Route::post('/delayed/refresh', 'AdminsController@delayedRefresh');

/* Search Delayed Reservations Route */
Route::post('/delayed/search', 'AdminsController@delayedSearch');

/* Refresh Tripes Route */
Route::post('/tripes/refresh', 'AdminsController@tripesRefresh');

/* Search Tripes Route */
Route::post('/tripes/search', 'AdminsController@tripesSearch');

/* Truncate Tripes Route */
Route::get('/tripes/truncate', 'AdminsController@tripesTruncate');

/* Truncate Comments Route */
Route::get('/comments/truncate', 'CommentsController@commentsTruncate');

/* Delete Comment Route */
Route::get('/comments/{id}/delete', 'CommentsController@destroy');

/* Buses Resources */
Route::resource('buses', 'BusesController');
/* Tripes Resources */
Route::resource('Tripes', 'TripesController');
/* Admins Resources */
Route::resource('admins', 'AdminsController');

/* User Authentication */
Route::get('users/login', 'Auth\LoginController@getLogin');
Route::post('auth/login', 'Auth\LoginController@postLogin');
Route::get('logout', 'Auth\LoginController@getLogout');

/* Excel download */
Route::get('/reservations/excel', 'MyController@reservationExcel');
Route::get('/delayed/excel', 'MyController@delayedExcel');
Route::get('/trips/excel', 'MyController@tripExcel');

/* Authenticated users */
Route::group(['middleware' => 'auth'], function () {
    /* Admins Panel Route */
    Route::get('/panel', 'AdminsController@index');
});

// Route::([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
