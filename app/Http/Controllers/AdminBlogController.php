<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class AdminBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->get();
       
        return view('admin.blogs.home', ['blogs' => $blogs]);
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Blog::create($data);

        return redirect(route('admin.blogs.index'))->with('status', 'Blog has been successfully saved.');
    }
}
