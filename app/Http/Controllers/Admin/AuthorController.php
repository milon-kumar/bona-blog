<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function show()
    {
//        return Auth::user()->where('role_id',2)
//                ->withCount('posts')
//                ->withCount('fevorite_posts')
//                ->withCount('comments')
//                ->get();

        return view('Backend.admin.all-author.index',[
            'authors'=>Auth::user()->where('role_id',2)
                ->withCount('posts')
                ->withCount('fevorite_posts')
                ->withCount('comments')
                ->get(),
        ]);
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->route('admin.author.show')->with('success','Your Data Deleted Successfully');
    }
}
