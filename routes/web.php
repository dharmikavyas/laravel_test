<?php

/* Admin Route */
Route::group(['namespace' => 'Admin' ],function(){

	Route::get('securepanel','LoginController@showLoginForm')->name('securepanel');
	Route::get('/','LoginController@showLoginForm');
	Route::post('admin-login','LoginController@login')->name('admin.login');
	Route::get('admin-home','HomeController@index')->name('admin.home');
	Route::get('logout', 'LoginController@logout');

	Route::resource('user','UserController');
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
