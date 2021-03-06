<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Message;
use App\Http\Requests\FormLoginRequest;

class UserController extends Controller
{
    public function index()
    {
    	$authors = User::orderBy('created_at', 'desc')->get();
    	return view('admin.users.index', compact('authors'));
    }

    public function reload()
    {
        $authors = json_encode(User::orderBy('created_at', 'desc')->get());
        return response($authors);
    }

    public function store()
    {
    	return view('admin.users._add');
    }

    public function create(Request $request)
    {
        $mss = new Message("Thêm thành công", true);
        try
        {
            $author = new User;
            $author->name = $request->get('name');
            $author->email = $request->get('email');
            $author->password = bcrypt('123456');

            $author->save();
        } 
        catch(Exception $e)
        {
            $mss->status = false;
            $mss->message = "Loi. Them that bai";
        }
        return response(json_encode($mss));
    }

    public function edit($id)
    {
    	$author = User::find($id);
    	return view('admin.users._edit', compact('author'));
        // return response(json_encode($author));
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            $keyword = $request->get('search');
            if($keyword == null)
                $authors = json_encode(User::get());
            else 
                $authors = json_encode(User::search($keyword)->get());
        }
        return response($authors);
    }

    public function delete($id)
    {
        $author = User::find($id);
        $author->delete($id);
        $mss = new Message("Xóa thành công", true);
        return response(json_encode($mss));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function signup(FormLoginRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        try {
            if (\Auth::attempt($data)) 
            {
                return redirect()->route('admin');
            }
        } catch (Exception $e) {
            return response()->json($ex, 500);
        }
        return response()->json([
            'status' => 500,
            'message' => 'Loi dang nhap'
        ]);
    }

    public function logout() 
    {
        \Auth::logout();
        return redirect()->route('admin.login');
    }
}
