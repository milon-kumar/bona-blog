<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthorPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.author.post.index',[
            'posts'=>Auth::user()->posts()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Backend.author.post.create',[
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();

        $this->validate($request,[
            'title'=>'required',
            'image'=>'required|image',
            'status'=>'required',
            'category'=>'required',
            'tag'=>'required',
            'body'=>'required',
        ]);
        $slug = Str::slug($request->title);
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName =$slug.time().'.'.$image->getClientOriginalExtension();
            $imagePath = 'uploads/post/'.$imageName;
            $image->move('uploads/post',$imageName);
        }

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imagePath;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->is_approved = false;
        $post->save();
        $post->categories()->attach($request->category);
        $post->tags()->attach($request->tag);

        return redirect()->back()->with('success','Your Post Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post->user_id !=  Auth::id()){
            return redirect()->back()->with('error','You are not authorize to access this post');
        }
        return view('Backend.author.post.show',[
            'post'=>$post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->user_id !=  Auth::id()){
            return redirect()->back()->with('error','You are not authorize to access this post');
        }
        return view('Backend.author.post.edit',[
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
            'post'=>$post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !=  Auth::id()){
            return redirect()->back()->with('error','You are not authorize to access this post');
        }


        $slug = Str::slug($request->title);
        if ($request->hasFile('image')){
            @unlink($post->image);
            $image = $request->file('image');
            $imageName =$slug.time().'.'.$image->getClientOriginalExtension();
            $imagePath = 'uploads/post/'.$imageName;
            $image->move('uploads/post',$imageName);

            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->slug = $slug;
            $post->image = $imagePath;
            $post->body = $request->body;
            $post->status = $request->status;
            $post->is_approved = false;
            $post->save();
            $post->categories()->sync($request->category);
            $post->tags()->sync($request->tag);
        }else{
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->slug = $slug;
            $post->image = $post->image;
            $post->body = $request->body;
            $post->status = $request->status;
            $post->is_approved = false;
            $post->save();
            $post->categories()->sync($request->category);
            $post->tags()->sync($request->tag);
        }
        return redirect()->route('author.post.index')->with('success','Your Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !=  Auth::id()){
            return redirect()->back()->with('error','You are not authorize to access this post');
        }

        @unlink($post->image);
        $post->delete();
        return redirect()->route('author.post.index')->with('success','Your Post Deleted Successfully');
    }
}
