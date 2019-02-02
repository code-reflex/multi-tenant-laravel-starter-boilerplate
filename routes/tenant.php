<?php

Route::group(['prefix' => '/'], function () {
	Route::resource('/users', 'UserController');
});

Route::group(['prefix' => '/'], function () {
	Route::resource('/permissions', 'PermissionController');
});

Route::group(['prefix' => '/'], function () {
	Route::resource('/roles', 'RoleController');
});
