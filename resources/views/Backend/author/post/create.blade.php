@extends('Backend.master')

@section('title')
    Add Post || Milon Kumar
@endsection

@section('content')

    <div class="page-wrapper">

        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Post Form</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('author.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Post Form</li>
                        </ul>
                        @if(Session::has('success'))
                            <h6 class="alert alert-success">SUCCESS {{Session::get('success')}}</h6>
                        @endif
                    </div>

                </div>
            </div>
            <form action="{{route('author.post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Title And Image</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label id="title">Post Title</label>
                                    <input type="text" name="title" class="form-control">
                                    @error('title')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label id="image">Post Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="">Status</label>
                                    <div class="col-md-10">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="1" name="status">&nbsp;&nbsp;&nbsp;Published
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="0" name="status">&nbsp;&nbsp;&nbsp;Unpublished
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
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group {{$errors->has('category') ? 'focused error' : ''}}">
                                    <label>Select Tag</label>
                                    <select name="tag" id="" class="form-control">
                                        <option>Select Tag</option>
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Post Save</button>
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
                                            <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
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
