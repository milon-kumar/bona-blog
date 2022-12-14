<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminFavoriteController extends Controller
{
    public function getFavorite()
    {
        $posts = Auth::user()->fevorite_posts;
        return view('Backend.admin.favorite.index',[
            'posts'=>$posts,
        ]);
    }
}
