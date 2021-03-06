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
    return view('/home');
});
Route::get('/home', function () {
    return view('/home');
});
Route::prefix('reservation')->group(function () {
    Route::get('/create_reservation', 'App\Http\Controllers\ReservationsController@list')->name('booking');
    Route::post('/create_reservation', 'App\Http\Controllers\ReservationsController@create')->name('create_reservation');
    Route::get('/edit_reservation/{id}', 'App\Http\Controllers\ReservationsController@view')->name('edit_reservation');
    Route::post('/edit_reservation/{id}', 'App\Http\Controllers\ReservationsController@update')->name('update_reservation');
    Route::post('/delete_reservation/{id}', 'App\Http\Controllers\ReservationsController@delete')->name('delete_reservation');
//    Route::post('/getDate', 'App\Http\Controllers\ReservationsController@getDate');

});
