<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorProfileController extends Controller
{
    public function profile($username)
    {
        $author = User::where('username',$username)->first();
        $post = $author->posts()->where('is_approved',1)->where('status',1)->get();

        return view('Frontend.author.profile',[
            'author'=>$author,
            'post'=>$post,
            'username'=>$username,
        ]);
    }
}
