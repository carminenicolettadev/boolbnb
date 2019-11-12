<?php

Route::get('/', function () { return redirect('/homepage');});
Route::get('/homepage','HomeController@index');
Route::get('/flats', 'FlatController@showAllFlats')->name('allFlats');

// Payment
Route::get('/payment/{id}', 'PaymentsController@index')->name('indexPayment');
Route::get('/payment/make', 'PaymentsController@make')->name('payment.make');

// Auth
Auth::routes();

// Profile
Route::get('/profile/{id}', 'UserController@showProfile')->name('profile')->middleware('auth');
Route::get('/editProfile/{id}', 'UserController@edit')->name('edit')->middleware('auth');
Route::post('/update/{id}', 'UserController@update')->name('update')->middleware('auth');
Route::get('/destroyProfile/{id}', 'UserController@destroy')->name('destroy')->middleware('auth');

// Flat
Route::get('/flat/{id}', 'FlatController@showFlat')->name('showFlat');
Route::get('/addFlat', 'FlatController@addFlat')->name('addFlat')->middleware('auth');
Route::post('/store', 'FlatController@storeFlat')->name('storeFlat')->middleware('auth');
Route::get('/{id}', 'FlatController@deleteFlat')->name('deleteFlat')->middleware('auth');
Route::get('edit/{id}', 'FlatController@editFlat')->name('editFlat')->middleware('auth');
Route::post('{id}', 'FlatController@updateFlat')->name('updateFlat')->middleware('auth');

