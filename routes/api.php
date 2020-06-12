<?php

Route::post('login', 'Api\ApiController@login')->middleware('localization');
Route::post('signup', 'Api\ApiController@signup')->middleware('localization');
Route::post('forgot', 'Api\ApiController@forgotpassword')->middleware('localization');


Route::namespace('Api')->middleware('auth:api','localization')->group(function () {
   	Route::get('user_profile', 'ApiController@user_profile');
   	Route::get('logout', 'ApiController@logout');
	Route::post('edit_user', 'ApiController@edit_user');
	Route::post('change_avatar', 'ApiController@change_avatar');	
});

