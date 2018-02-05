<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
    	$title = "Chủ đề";
    	return view('admin.categories.index', compact('title'));
    }
}
