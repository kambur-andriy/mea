<?php

/**
 * Index
 */
Route::group(['middleware' => ['nocache']], function () {

	Route::get('/', 'IndexController@login');
	Route::get('register', 'IndexController@register');
	Route::get('forgot-password', 'IndexController@forgotPassword');
	Route::get('reset-password', 'IndexController@resetPassword');

});

/**
 * Account
 */
Route::group(['prefix' => 'account', 'middleware' => ['nocache']], function () {

	Route::post('create', 'AccountController@create');
	Route::post('login', 'AccountController@login');
	Route::post('logout', 'AccountController@logout');
	Route::post('reset-password', 'AccountController@resetPassword');
	Route::post('update-password', 'AccountController@updatePassword');

});


/**
 * User
 */
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'nocache']], function () {

	Route::get('/', 'UserController@index');
	Route::get('/translate', 'UserController@translateWord');
	Route::get('/translate/view', 'UserController@translationsList');
	Route::get('/dictionary', 'UserController@descriptionsList');
	Route::get('/dictionary/extend', 'UserController@describeWord');
	Route::get('/dictionary/view/{id}', 'UserController@viewWord');
	Route::get('/dictionary/revise', 'UserController@reviseWord');
	Route::get('/dictionary/practice', 'UserController@practiceWord');

});


/**
 * Dictionary
 */
Route::group(['prefix' => 'dictionary', 'middleware' => ['auth', 'nocache']], function () {

	Route::post('/translate', 'DictionaryController@translateWord');
	Route::post('/extend', 'DictionaryController@describeWord');

});