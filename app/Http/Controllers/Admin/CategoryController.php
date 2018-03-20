<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Message;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('created_at', 'desc')->get();
    	return view('admin.categories.index', compact('categories'));
        // return response($categories);
    }

    public function reload()
    {
        $categories = json_encode(Category::orderBy('created_at', 'desc')->get());
        return response($categories);
    }

    public function store()
    {
        return view('admin.categories._add');
    }

    public function create(Request $request)
    {
        $mss = new Message('Thêm mới thành công', true);
        try {
            $category = new Category;
            $category->title = $request->get('title');
            $category->slug = changeTitle($request->get('title'));
            $category->save();
        } catch(Exception $e) {
            $mss->message = "Thêm mới thất bại";
            $mss->status = false;
        }
        return response()->json($mss);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories._edit', compact('category'));
    }

    public function update(Request $request)
    {
        $mss = new Message('Cập nhật thành công', true);
        try {
            $category = Category::findOrFail($request->get('id'));
            $title = $request->get('title');
            $category->title = $title;
            $category->slug = changeTitle($title);
            $category->save();
        } catch(Exception $e) {
            $mss->message = 'Lỗi. Cập nhật thất bại';
            $mss->status = false;
        }
        return response()->json($mss);
    }

    public function search($keyword)
    {
        $keyword = trim($keyword);
        if($keyword == null ) 
            $categories = json_encode(Category::orderBy('created_at', 'desc')->get());
        else 
            $categories = json_encode(Category::where('title', 'like', "%{$keyword}%")->get());
        return response($categories);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'message' => 'Xóa thành công'
        ], 200);
    }
}
