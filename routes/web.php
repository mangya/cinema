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

Route::get('/', 'WebsiteController@index')->name('home');
Route::get('/home', 'WebsiteController@showHome')->name('show.home');

Route::get('/get-venues/{location_id}', 'WebsiteController@getVenues')->name('get.venues');
Route::get('/get-shows/{venue_id}', 'WebsiteController@getShows')->name('get.shows');
Route::get('/get-booking/{booking_code}', 'WebsiteController@getBooking')->name('get.booking');
Route::get('/track', 'WebsiteController@showTrackPage')->name('track.page');

Auth::routes();

Route::get('/booking/{event_code}', 'HomeController@booking')->name('booking.details');
Route::post('/book-show', 'HomeController@bookShow')->name('book.show');
Route::post('/cancel-booking', 'HomeController@cancelBooking')->name('cancel.booking');
Route::get('/my-bookings', 'HomeController@showBookings')->name('my.bookings');
