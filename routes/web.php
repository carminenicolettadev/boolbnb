<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UserController@index')->name('users');
Route::get('/flats', 'FlatController@index')->name('flats');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
