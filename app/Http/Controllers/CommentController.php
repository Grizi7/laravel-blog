<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(Request $request, $id){
        $post = Post::findOrFail($id);
        if(!$post){
            return response()->json([
                'errors' => [
                    'Post not found',
                ]
            ]);
        }
        
        $data = $request->validate([
            'body' => 'required|string|max:255',
        ]);

        $data['user_id'] = auth()->id();
        $data['post_id'] = $id;

        $comment =Comment::create($data);

        return response()->json([
            'success' => true,
            'comment' => $comment,
            'user' => $comment->user,
        ]);
    }
}
