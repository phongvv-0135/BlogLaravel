<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post) {
        request()->validate([
            'body' => 'required|max:1000'
        ]);

        $post->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->user()->id
        ]);

        return back();
    }
}
