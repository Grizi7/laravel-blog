<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.posts', [
            'do' => 'view',
            'posts' => $posts
        ]);
    }

    public function add(){
        return view('admin.posts', [
            'do' => 'add'
        ]);
    }
    
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);
        $data['user_id'] = auth()->id();
        $data['is_published'] = true;
        if ($request->file('image') != null) {
            $data['image'] = $request->file('image')->store('images/posts');
        }else{
            $data['image'] = 'images/posts/default.png';
        }
        Post::create($data);
        return redirect()->route('posts')->with('success', 'Post created successfully');
    }

    public function edit(string $id){
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('posts')->with('error', 'Post not found');
        }
        return view('admin.posts', [
            'do' => 'edit',
            'post' => $post
        ]);
    }

    public function update(Request $request, string $id){
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('posts')->with('error', 'Post not found');
        }
        $data = $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);
        if ($request->file('image') != null) {
            if ($post->image != 'images/posts/default.png') {
                unlink(public_path('storage/'.$post->image));
            }
            $data['image'] = $request->file('image')->store('images/posts');
        }else{
            unset($data['image']);
        }
        $post->update($data);
        return redirect()->route('posts')->with('success', 'Post updated successfully');
    }

    public function publishControl(Request $request)
    {
        $post = Post::find($request->id);
        if (!$post) {
            return redirect()->route('posts')->with('error', 'Post not found');
        }
        $post->is_published = ($request->do == 'publish');
        $post->save();
        return redirect()->route('posts')->with('success', 'Post '. $request->do .'ed successfully');
    }

    public function delete($id){
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('posts')->with('error', 'Post not found');
        }

        if ($post->image != 'images/posts/default.png') {
            unlink(public_path('storage/'.$post->image));
        }
        $post->delete();
        return redirect()->route('posts')->with('success', 'Post deleted successfully');
    }

}
