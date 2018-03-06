<?php

Route::get('/', [
	'uses' => 'BlogController@index',
	'as' => 'blog'
]);

Route::get('blog/{post}', [
	'uses' => 'BlogController@show',
	'as' => 'blog.show'
]);

Route::get('chude/{category}', [
	'uses' => 'BlogController@category',
	'as' => 'category'
]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

	Route::get('/', [
		'uses' => 'AdminController@index',
		'as' => 'admin'
	]);

	// Post
	Route::get('/baiviet', [
		'uses' => 'PostController@index',
		'as' => 'admin.post'
	]);
	Route::get('/baiviet/themmoi', [
		'uses' => 'PostController@store',
		'as' => 'admin.post.add'
	]);


	// Category
	Route::get('/chude', [
		'uses' => 'CategoryController@index',
		'as' => 'admin.category'
	]);


	// User
	Route::get('/nguoidung', [
		'uses' => 'UserController@index',
		'as' => 'admin.user'
	]);
});
