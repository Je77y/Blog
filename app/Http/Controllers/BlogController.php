<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogController extends Controller
{
	protected $limit = 3;

    public function index()
    {
    	// \DB::enableQueryLog();
        $posts = Post::with('author')
            ->published()
    		->simplePaginate($this->limit);
    		// ->paginate(3);
    	return view("blog.index", compact('posts'));
    	// view("blog.index", compact('posts'))->render();
    	// dd(\DB::getQueryLog());
    }	

    public function show(Post $post)
    {
        return view("blog.show", compact('post'));
    }

    public function category(Category $category)
    {
        $categoryName = $category->title;

        $posts = $category
            ->posts()
            ->with('author')
            ->published()
            ->simplePaginate($this->limit);
        return view("blog.index", compact('posts', 'categoryName'));
    }
}
