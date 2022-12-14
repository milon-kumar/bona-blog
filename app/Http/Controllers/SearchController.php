<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $post = Post::where('title','LIKE',"%$query%")->where('status',true)->where('is_approved',true)->get();
        return view('Frontend.search.index',[
            's_posts'=>$post,
            'query'=>$query,
        ]);
    }
}
