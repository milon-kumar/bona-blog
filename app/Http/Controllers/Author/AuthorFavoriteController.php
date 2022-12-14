<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorFavoriteController extends Controller
{
    public function getFavorite()
    {
        $posts = Auth::user()->fevorite_posts;
        return view('Backend.author.favorite.index',[
            'posts'=>$posts,
        ]);
    }
}
