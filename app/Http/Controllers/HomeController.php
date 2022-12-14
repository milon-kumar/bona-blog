<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function loadHome()
    {

        return view('Frontend.home.home',[
            'categories'=>Category::all(),
            'posts'=>Post::where('status',true)->where('is_approved',true)->latest()->take(9)->get(),
        ]);
    }

    public function categoryPost($slug)
    {
        $category = Category::where('slug',$slug)->first();
        return view('Frontend.category.index',[
            'category'=>$category,
        ]);
    }
    public function tagByPost($slug)
    {
        $tags = Tag::where('slug',$slug)->first();
        return view('Frontend.tag.index',[
            'tags'=>$tags,
        ]);
    }


}
