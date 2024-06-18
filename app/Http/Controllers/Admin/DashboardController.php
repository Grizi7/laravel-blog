<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallRequest;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $postsCount = Post::count();
        $commentsCount = Comment::count();
        $topUsers = User::withCount(['posts', 'comments'])
            ->orderBy(DB::raw('posts_count + comments_count'), 'desc')
            ->limit(5)
            ->get();
        $requests = CallRequest::latest()->take(5)->get();
        return view('admin.dashboard', [
            'usersCount' => $usersCount,
            'postsCount' => $postsCount,
            'commentsCount' => $commentsCount,
            'topUsers' => $topUsers,
            'requests' => $requests
        ]);
    }
}
