<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)->latest()->limit(5)->get();
        return view('home.index', [
            'posts' => $posts
        ]);
    }

    public function about()
    {
        return view('home.about');
    }

}
