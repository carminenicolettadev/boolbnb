<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/flats', 'FlatController@index')->name('flats');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', 'UserController@showProfile')->name('profile')->middleware('auth');
Route::get('/addFlat', 'FlatController@addFlat')->name('addFlat')->middleware('auth');
Route::post('/', 'FlatController@storeFlat')->name('storeFlat')->middleware('auth');
<<<<<<< HEAD
Route::get('/flat/{id}', 'FlatController@showFlat')->name('showFlat')->middleware('auth');
=======
Route::get('/flat/{id}', 'FlatController@showFlat')->name('showFlat');

>>>>>>> 0448f73c365e74fdb7953ef868ffa3b8bc8c1007
Route::get('/{id}', 'FlatController@deleteFlat')->name('deleteFlat')->middleware('auth');
