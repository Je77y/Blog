<?php

Route::get('blog', function () {
    return view('blog.index');
});

Route::get('blog/show', function () {
    return view('blog.show');
});
