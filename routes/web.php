<?php

Route::get('blog', [
	'uses' => 'BlogController@index',
]);

Route::get('blog/show', function () {
    return view('blog.show');
});
