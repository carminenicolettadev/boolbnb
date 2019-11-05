<?php

Route::get('/', function () { return redirect('/homepage');});
Route::get('/homepage', function () { return view('welcome');});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//show profile
Route::get('/profile/{id}', 'UserController@showProfile')->name('profile')->middleware('auth');
//show single flat
Route::get('/flat/{id}', 'FlatController@showFlat')->name('showFlat');

Route::get('/addFlat', 'FlatController@addFlat')->name('addFlat')->middleware('auth');
Route::post('/store', 'FlatController@storeFlat')->name('storeFlat')->middleware('auth');

Route::get('/{id}', 'FlatController@deleteFlat')->name('deleteFlat')->middleware('auth');

Route::get('edit/{id}', 'FlatController@editFlat')->name('editFlat')->middleware('auth');
Route::post('{id}', 'FlatController@updateFlat')->name('updateFlat')->middleware('auth');
