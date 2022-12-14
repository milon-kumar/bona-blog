<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FevoriteController extends Controller
{
    public function add($post)
    {
        $user = Auth::user();
        $isFavorite = $user->fevorite_posts()->where('post_id',$post)->count();
        if ($isFavorite == 0)
        {

            $user->fevorite_posts()->attach($post);
            return redirect()->back()->with('status','Post Successfully Added Your Favorite List');

        }else{
            $user->fevorite_posts()->detach($post);
            return redirect()->back()->with('status','Post Successfully Removed Your Favorite List');
            return redirect()->route('admin.favorite')->with('success','Post Successfully Removed Your Favorite List');
        }
    }
}
