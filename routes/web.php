<?php

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

//Admin Area Routes
Route::namespace('Admin')->prefix('admin')->group(function (){
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
    Route::resource('hotel', 'HotelController');
    Route::resource('city', 'CityController');
    Route::resource('country', 'CountryController');
    Route::resource('area', 'AreaController');
    Route::resource('attraction', 'AttractionController');
    Route::resource('room', 'RoomController');
    Route::resource('room-type', 'RoomTypeController');
    Route::resource('bed-type', 'BedTypeController');
    Route::resource('users', 'UserController');
});



