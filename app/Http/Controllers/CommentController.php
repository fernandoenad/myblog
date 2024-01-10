<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function store(Blog $blog, Request $request){
        $data = $request->validate([
            'name' => 'required|min:8',
            'email' => 'required|email',
            'comment' => 'required|min:8',
        ]);

        $newComment = $blog->comments()->create($data);

        return redirect(route('home.show', ['blog' => $blog]));
    }
}
