<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
    	$title = "Bài viết";
    	return view('admin.posts.index', compact('title'));
    }
}
