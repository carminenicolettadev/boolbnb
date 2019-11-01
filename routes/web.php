<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/flats', 'FlatController@index')->name('flats');

Route::get('/profile/{id}', 'UserController@showProfile')->name('profile')->middleware('auth');
