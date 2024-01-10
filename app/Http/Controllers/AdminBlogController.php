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

    public function modify(Blog $blog)
    {
        return view('admin.blogs.modify', ['blog' => $blog]);
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog->update($data);

        return redirect(route('admin.blogs.modify', ['blog' => $blog]))->with('status', 'Blog has been successfully updated.');
    }

    public function delete(Blog $blog)
    {
        return view('admin.blogs.delete', ['blog' => $blog]);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect(route('admin.blogs.index'))->with('status', 'Blog has been successfully deleted.');
    }
}
