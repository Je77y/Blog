<?php

Route::get('/', [
	'uses' => 'BlogController@index',
	'as' => 'blog'
]);

Route::get('blog/{post}', [
	'uses' => 'BlogController@show',
	'as' => 'blog.show'
]);

Route::get('category/{category}', [
	'uses' => 'BlogController@category',
	'as' => 'category'
]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

	Route::get('/', [
		'uses' => 'AdminController@index',
		'as' => 'admin'
	]);

	// Post
	Route::get('/post', [
		'uses' => 'PostController@index',
		'as' => 'admin.post'
	]);


	// Category
	Route::get('/category', [
		'uses' => 'CategoryController@index',
		'as' => 'admin.category'
	]);


	// User
	Route::get('/user', [
		'uses' => 'UserController@index',
		'as' => 'admin.user'
	]);
});
