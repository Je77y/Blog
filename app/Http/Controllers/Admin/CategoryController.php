<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Message;
use App\Repositories\Repository;

class CategoryController extends Controller
{
    private $model;

    public function __construct(Category $category)
    {
        $this->model = new Repository($category);
    }

    public function index()
    {
    	$categories = $this->model->all();
    	return view('admin.categories.index', compact('categories'));
        // return response($categories);
    }

    public function reload()
    {
        $categories = json_encode($this->model->all());
        return response($categories);
    }

    public function store()
    {
        return view('admin.categories._add');
    }

    public function create(Request $request)
    {
        $data = array_map('trim', $request->all());
        $mss = new Message('Thêm mới thành công', true);
        try {
            
            $data += array('slug' => changeTitle($data['title']));
            $this->model->create($data);
        } catch(Exception $e) {
            $mss->message = "Thêm mới thất bại";
            $mss->status = false;
        }
        return response()->json($mss);
    }

    public function edit($id)
    {
        $category = $this->model->show($id);
        return view('admin.categories._edit', compact('category'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $mss = new Message('Cập nhật thành công', true);
        try {
            $category = $this->model->show($data['id']);
            $title = $request->get('title');
            $category->title = $title;
            $category->slug = changeTitle($title);
            $arr = array('title' => $category->title, 'slug' => $category->slug);
            $this->model->update($arr, $data['id']);
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
        $this->model->delete($id);
        return response()->json([
            'message' => 'Xóa thành công'
        ], 200);
    }
}
