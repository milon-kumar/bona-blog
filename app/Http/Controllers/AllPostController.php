<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AllPostController extends Controller
{
    public function index()
    {
        return view('Frontend.all-post.index',[
            'all_posts'=>Post::where('status',true)->where('is_approved',true)->paginate(6),
        ]);
    }
}
