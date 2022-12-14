<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorCommentController extends Controller
{
    public function index()
    {
        return view('Backend.author.comment.index',[
            'posts'=>Auth::user()->posts,
        ]);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->post->user->id == Auth::id()){
            $comment->delete();
            return redirect()->back()->with('success','Your Comment Info Deleted Successfully');
        }else{
            return redirect()->back()->with('error','You are not authorize to delete this comment');
        }
    }
}
