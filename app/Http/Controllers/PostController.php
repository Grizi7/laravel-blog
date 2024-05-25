<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return view('errors.404');
        }
        return view('home.post', [
            'post' => $post
        ]);
    }
}
