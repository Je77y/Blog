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

Route::get('/admin/login', function() {
	return view('admin.login');
});

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
	Route::get('/baiviet/capnhat/{baiviet}', [
		'uses' => 'PostController@edit',
		'as' => 'admin.post.edit'
	]);


	// Category
	Route::get('/chude', [
		'uses' => 'CategoryController@index',
		'as' => 'admin.category'
	]);
	Route::get('/chude/themmoi', [
		'uses' => 'CategoryController@store',
		'as' => 'admin.category.store'
	]);
	Route::post('/chude/taomoi', [
		'uses' => 'CategoryController@create',
		'as' => 'admin.category.create'
	]);
	Route::get('/chude/capnhat/{chude}', [
		'uses' => 'CategoryController@edit',
		'as' => 'admin.category.edit'
	]);
	Route::post('/chude/sua', [
		'uses' => 'CategoryController@update', 
		'as' => 'admin.category.update'
	]);
	Route::get('/chude/lammoi', [
		'uses' => 'CategoryController@reload',
		'as' => 'admin.category.reload'
	]);
	Route::get('/chude/timkiem/{tukhoa}', [
		'uses' => 'CategoryController@search',
		'as' => 'admin.category.search'
	]);
	Route::get('/chude/xoa/{id}', [
		'uses' => 'CategoryController@delete',
		'as' => 'admin.category.delete'
	]);


	// User
	Route::get('/tacgia', [
		'uses' => 'UserController@index',
		'as' => 'admin.user'
	]);
	Route::get('/tacgia/themmoi', [
		'uses' => 'UserController@store',
		'as' => 'admin.user.add'
	]);
	Route::post('/tacgia/taomoi', [
		'uses' => 'UserController@create',
		'as' => 'admin.user.create'
	]);
	Route::get('/tacgia/capnhat/{tacgia}', [
		'uses' => 'UserController@edit',
		'as' => 'admin.user.edit'
	]);
	Route::get('/tacgia/lammoi', [
		'uses' => 'UserController@reload',
		'as' => 'admin.user.reload'
	]);
	Route::get('/tacgia/timkiem', [
		'uses' => 'UserController@search', 
		'as' => 'admin.user.search'
	]);
	Route::get('/tacgia/xoa/{id}', [
		'uses' => 'UserController@delete',
		'as' => 'admin.user.delete'
	]);
	Route::get('/tacgia/doimatkhau', [

	]);

});
