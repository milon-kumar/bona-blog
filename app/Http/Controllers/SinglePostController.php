<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SinglePostController extends Controller
{
    public function singlePost($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $blogKey = 'blog_'.$post->id;
        if (!Session::has($blogKey)){
            $post->increment('view_count');
            Session::put($blogKey,1);
        }
            return view('Frontend.single-post.single-post',[
                'post'=>Post::where('slug',$slug)->where('status',true)->where('is_approved',true)->first(),
                'randomPost'=>Post::all()->where('status',true)->where('is_approved',true)->random(3),
                'tags'=>Tag::all(),
                'categories'=>Category::all(),
            ]);
    }
}
