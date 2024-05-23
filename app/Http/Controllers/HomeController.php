<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->limit(5)->get();
        return view('home.index', [
            'posts' => $posts
        ]);
    }

    public function post($id)
    {
        $post = Post::find($id);
        return view('home.post', [
            'post' => $post
        ]);
    }
    
}
