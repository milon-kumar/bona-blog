@extends('Backend.master')

@section('title')
    Update Post || Milon Kumar
@endsection

@section('content')

    <div class="page-wrapper">

        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Update Form</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Post Form</li>
                        </ul>
                        @if(Session::has('success'))
                            <h6 class="alert alert-success">SUCCESS {{Session::get('success')}}</h6>
                        @endif
                    </div>

                </div>
            </div>
            <form action="{{route('admin.post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Title And Image</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label id="title">Post Title</label>
                                    <input type="text" value="{{$post->title}}" name="title" class="form-control">
                                    <input type="hidden" value="{{$post->id}}" name="id" class="form-control">
                                    @error('title')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label id="image">Post Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <img style="width: 150px;height: 80px;" src="{{asset($post->image)}}" alt="{{$post->slug}}">
                                    @error('image')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="">Status</label>
                                    <div class="col-md-10">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="1" {{$post->status == 1 ? 'checked' : ''}} name="status">&nbsp;&nbsp;&nbsp;Published
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="0" {{$post->status == 0 ? 'checked' : ''}} name="status">&nbsp;&nbsp;&nbsp;Unpublished
                                            </label>
                                        </div>
                                        @error('status')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Category And Tags</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group {{$errors->has('category') ? 'focused error' : ''}}">
                                    <label>Select Category</label>
                                    <select name="category" id="" class="form-control">
                                        <option>Select Category</option>
                                        @foreach($categories as $category)
                                            <option @foreach($post->categories as $p_category) {{
                                                                    $p_category->id == $category->id ?'selected' : ''
}} @endforeach value="{{$category->id}}" >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group {{$errors->has('category') ? 'focused error' : ''}}">
                                    <label>Select Tag</label>
                                    <select name="tag" id="" class="form-control">
                                        <option>Select Tag</option>
                                        @foreach($tags as $tag)
                                            <option @foreach($post->tags as $p_tag) {{
                                                        $p_tag->id == $tag->id ? 'selected' : ''
}} @endforeach value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Post Body</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="body">Post Body</label>
                                            <textarea class="form-control" name="body" id="body" cols="30" rows="10">{!! $post->body !!}</textarea>
                                            @error('body')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
