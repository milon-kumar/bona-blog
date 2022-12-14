<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $post = $user->posts;
        $popular_posts = $user->posts()
            ->withCount('comments')
            ->withCount('favoriteToUsers')
            ->orderBy('view_count','DESC')
            ->orderBy('comments_count','DESC')
            ->orderBy('favorite_to_users_count','DESC')
            ->take(5)
            ->get();
        $pending_post = $post->where('is_approved',0)->count();
        $all_view = $post->sum('view_count');
        return view('Backend.author.dashboard.index',[
            'posts'=>$post,
            'popular_posts'=>$popular_posts,
            'pending_post'=>$pending_post,
            'all_view'=>$all_view,
        ]);
    }
}
