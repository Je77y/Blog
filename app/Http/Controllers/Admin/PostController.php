<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
    	$posts = json_encode(Post::with('author')->with('category')->orderBy('created_at', 'desc')->get());
    	return view('admin.posts.index', compact('posts'));
    	// return response($posts);
    }

    public function store()
    {
    	return view('admin.posts._add');
    	// return response(json_encode("Thanh cong"));
    }
}
