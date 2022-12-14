<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function pending()
    {
        return view('Backend.admin.post.approve',[
            'posts'=>Post::where('is_approved',false)->get(),
        ]);
    }

    public function approve($id)
    {
        $post = Post::find($id);
        $post->is_approved = true;
        $post->save();
        return redirect()->route('admin.pending')->with('success','Post Is Appreved');
    }
}
