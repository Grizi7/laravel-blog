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

    public function delete($id){
        // $post = Post::find($id);
        // $post->delete();
        // return redirect()->route('posts')->with('success', 'Post deleted successfully');
        return 'delete';
    }

}
