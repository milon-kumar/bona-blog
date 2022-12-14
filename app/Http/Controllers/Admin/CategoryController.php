<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('Backend.admin.category.index',[
            'categories'=>Category::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('Backend.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required|unique:categories',
           'category_image'=>'required|mimes:jpeg,jpg,png',
           'banner_image'=>'required|mimes:jpeg,jpg,png',
        ]);

//        Smart Image Uploads
        $category_image = $request->file('category_image');
        $banner_image = $request->file('banner_image');
        $slug = Str::slug($request->name);

//        return $category_image . $banner_image . $slug;
            $currentData = Carbon::now()->toDateString();
            $imagenamecategory = $currentData.'-'.$slug.'-'.uniqid().'.'.$category_image->getClientOriginalExtension();

            $currentData = Carbon::now()->toDateString();
            $imagenamebanner = $currentData.'-'.$slug.'-'.uniqid().'.'.$banner_image->getClientOriginalExtension();

        $category_image->move('uploads/category',$imagenamecategory);
        $banner_image->move('uploads/category/banner',$imagenamebanner);

       $category = new Category();
       $category->name = $request->name;
        $category->slug = $slug;
        $category->category_image = 'uploads/category/'.$imagenamecategory;
        $category->banner_image = 'uploads/category/banner/'.$imagenamebanner;
        $category->save();
        return redirect()->back()->with('success','Your Category Save Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Backend.admin.category.edit',[
            'category'=>Category::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'name'=>'required|unique:categories',
    ]);
//        return $request->all();
        $category = Category::find($id);
        $slug = Str::slug($request->name);
        if($request->hasFile('category_image') && $request->hasFile('banner_image')){
            @unlink($category->category_image);
            @unlink($category->banner_image);

            $category_image = $request->file('category_image');
            $banner_image = $request->file('banner_image');


//        return $category_image . $banner_image . $slug;
            $currentData = Carbon::now()->toDateString();
            $imagenamecategory = $currentData.'-'.$slug.'-'.uniqid().'.'.$category_image->getClientOriginalExtension();

            $currentData = Carbon::now()->toDateString();
            $imagenamebanner = $currentData.'-'.$slug.'-'.uniqid().'.'.$banner_image->getClientOriginalExtension();

            $category_image->move('uploads/category',$imagenamecategory);
            $banner_image->move('uploads/category/banner',$imagenamebanner);
            $category->name = $request->name;
            $category->slug = $slug;
            $category->category_image = 'uploads/category/'.$imagenamecategory;
            $category->banner_image = 'uploads/category/banner/'.$imagenamebanner;
            $category->save();
        }
        else
        {
            $category->name = $request->name;
            $category->slug = $slug;
            $category->category_image = $category->category_image;
            $category->banner_image = $category->banner_image;
            $category->save();
        }
        return  redirect()->route('admin.category.index')->with('success','Your Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        @unlink($category->category_image);
        @unlink($category->banner_image);
        $category->delete();
        return  redirect()->route('admin.category.index')->with('success','Your Data Update Successfully');
    }
}
