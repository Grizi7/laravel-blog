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
        return view('home.myPosts', [
            'do' => 'add'
        ]);
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

        return redirect()->route('myPosts')->with('success', 'Post created successfully, please wait for approval.');
    }

    public function myPosts(Request $request)
    {
        $user = $request->user();
        $posts = $user->posts;
        return view('home.myPosts', [
            'do' => 'view',
            'posts' => $posts
        ]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return view('errors.404');
        }
        if ($post->user_id != auth()->id()) {
            return view('errors.404');
        }
        return view('home.myPosts', [
            'do' => 'edit',
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return view('errors.404');
        }
        if ($post->user_id != auth()->id()) {
            return view('errors.404');
        }

        $data = $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);
        
        if ($request->file('image') != null) {
            if ($post->image != 'images/posts/default.png') {
                unlink(public_path('storage/' . $post->image));
            }
            $data['image'] = $request->file('image')->store('images/posts');
        } else {
            $data['image'] = $post->image;
        }
        $data['is_published'] = false;
        
        $post->update($data);

        return redirect()->route('myPosts')->with('success', 'Post updated successfully, please wait for approval.');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return view('errors.404');
        }
        if ($post->user_id != auth()->id()) {
            return view('errors.404');
        }
        if ($post->image != 'images/posts/default.png') {
            unlink(public_path('storage/' . $post->image));
        }
        $post->delete();
        return redirect()->route('myPosts')->with('success', 'Post deleted successfully.');
    }
}
