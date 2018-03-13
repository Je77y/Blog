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
    	$categories = json_encode(Category::orderBy('created_at', 'desc')->get());
    	return view('admin.categories.index', compact('categories'));
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

    }

    public function search(Request $request)
    {

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
