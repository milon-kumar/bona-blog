@extends('Backend.master')

@section('title')
    Category || Milon Kumar
@endsection
@section('content')

    <div class="main-wrapper">

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Categories Tables</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Categories Tables</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card mb-0">
                            <div class="card-header">
                                @if(Session::has('success'))
                                    <h6 class="alert alert-success">SUCCESS {{Session::get('success')}}</h6>
                                @endif
                                    <h3 class="card-text d-inline-block"> Tag Table - <sapn class="badge badge-success">{{$categories->count()}}</sapn></h3>
                                <a href="{{route('admin.category.create')}}" class="float-right btn btn-success btn-sm">Add Category</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped mb-0">
                                        <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Image</th>
                                            <th>Post Count</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $key => $category)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$category->name}}</td>
                                                <td><code>{{$category->slug}}</code></td>
                                                <td>
                                                    <img style="width: 100px;height: 50px;" src="{{asset($category->category_image)}}" alt="{{$category->slug}}">
                                                </td>
                                                <td>{{$category->posts->count()}}</td>
                                                <td>{{$category->created_at->diffForHumans()}}</td>
                                                <td>
                                                    <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="{{route('admin.category.destroy',$category->id)}}" onclick="event.preventDefault();document.getElementById('deleteFrom'+{{$category->id}}).submit();"  class="btn btn-danger btn-sm">Delete</a>
                                                    <form id="deleteFrom{{$category->id}}" action="{{route('admin.category.destroy',$category->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

