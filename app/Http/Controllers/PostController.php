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

    public function add()
    {
        return view('home.add');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);
        $data['user_id'] = auth()->id();
        if ($request->file('image') != null) {
            $data['image'] = $request->file('image')->store('images/posts');
        } else {
            $data['image'] = 'images/posts/default.png';
        }
        Post::create($data);

        return redirect()->route('home')->with('success', 'Post created successfully, please wait for approval.');
    }
}
