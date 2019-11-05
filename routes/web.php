<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', 'UserController@showProfile')->name('profile')->middleware('auth');
Route::get('/addFlat', 'FlatController@addFlat')->name('addFlat')->middleware('auth');
Route::post('/', 'FlatController@storeFlat')->name('storeFlat')->middleware('auth');

Route::get('/flat/{id}', 'FlatController@showFlat')->name('showFlat')->middleware('auth');

Route::get('/{id}', 'FlatController@deleteFlat')->name('deleteFlat')->middleware('auth');

Route::get('edit/{id}', 'FlatController@editFlat')->name('editFlat')->middleware('auth');
Route::post('{id}', 'FlatController@updateFlat')->name('updateFlat')->middleware('auth');
