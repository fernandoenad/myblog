<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->get();
        //dd($blogs);

        return view('home', ['blogs' => $blogs]);
    }

    public function show(Blog $blog){

        return view('show', ['blog' => $blog]);
    }
}
