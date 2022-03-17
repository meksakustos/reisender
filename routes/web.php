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
Route::prefix('reservation')->group(function () {
    Route::get('/create_reservation', 'App\Http\Controllers\ReservationsController@list')->name('list_room');
    Route::post('/create_reservation', 'App\Http\Controllers\ReservationsController@create')->name('create_reservation');
    Route::get('/view_reservation', 'App\Http\Controllers\ReservationsController@view')->name('view_reservation');
});
