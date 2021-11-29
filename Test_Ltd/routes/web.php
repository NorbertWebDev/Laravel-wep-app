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
    return view('home');
});

Route::get('/Home', 'App\Http\Controllers\HomeController@Home');
Route::get('/About', 'App\Http\Controllers\AboutController@About');
Route::get('/Menu', 'App\Http\Controllers\MenuController@Menu');
Route::get('/Specials', 'App\Http\Controllers\SpecialsController@Specials');
Route::get('/Events', 'App\Http\Controllers\EventsController@Events');
Route::get('/Gallery', 'App\Http\Controllers\GalleryController@Gallery');
Route::get('/Chefs', 'App\Http\Controllers\ChefsController@Chefs');
Route::get('/Contact', 'App\Http\Controllers\ContactController@Contact');
Route::get('/Booking', 'App\Http\Controllers\BookingController@Booking');
