<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $popular_post  = Post::withCount('comments')
            ->withCount('favoriteToUsers')
            ->orderBy('view_count','desc')
            ->orderBy('comments_count','desc')
            ->orderBy('favorite_to_users_count','desc')
            ->take(5)->get();
       $total_pending_post = Post::where('is_approved',false)->count();
       $view_count = Post::sum('view_count');
       $author_count = User::where('role_id',2)->count();
       $new_author_today = User::where('role_id',2)->whereDate('created_at',Carbon::today())->count();
       $active_user = User::where('role_id',2)
           ->withCount('posts')
           ->withCount('comments')
           ->withCount('fevorite_posts')
           ->orderBy('posts_count','desc')
           ->orderBy('comments_count','desc')
           ->orderBy('fevorite_posts_count','desc')
           ->take(10)
           ->get();
       $category_count = Category::all()->count();
       $tag_count = Tag::all()->count();
        return view('Backend.admin.dashboard.index',[
            'posts'=>$posts,
            'popular_post'=>$popular_post,
            'total_pending_post'=>$total_pending_post,
            'view_count'=>$view_count,
            'author_count'=>$author_count,
            'new_author_today'=>$new_author_today,
            'active_user'=>$active_user,
            'category_count'=>$category_count,
            'tag_count'=>$tag_count,
        ]);
    }
}
