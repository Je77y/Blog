<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    private function getListPost($user) 
    {
        if ($user->role_id == 1 || $user->role_id == 2) 
        {
            $posts = Post::with('author')->with('category')->orderBy('created_at', 'desc')->get();
        }
        else 
        {
            $posts = Post::with('author')->with('category')->orderBy('created_at', 'desc')->where('author_id', $user->id)->get();
        }

        return $posts;
    }

    public function index()
    {
        $user = \Auth::user();
    	$posts = $this->getListPost($user);
    	return view('admin.posts.index', compact('posts'));
    	// return response($posts);
    }

    public function store()
    {
    	return view('admin.posts._add');
    	// return response(json_encode("Thanh cong"));
    }

    public function edit($baiviet)
    {  
    	return view('admin.posts._edit', compact('baiviet'));
    }

    public function update(Request $request)
    {
        
    }

    public function delete($id)
    {
        try {
            $baiviet = Post::findOrFail($id);
            $baiviet->destroy($id);
        } catch (Exection $ex) {
            return response()->json([
                'message' => $ex,
                'status' => 404
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Xoa thanh cong'
        ]);
    }
}
