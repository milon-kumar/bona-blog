@extends('Backend.master')

@section('title')
    Post || Milon Kumar
@endsection
@section('content')

    <div class="main-wrapper">

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Post Tables</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('author.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Post Tables</li>
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
                                @if(Session::has('error'))
                                    <h6 class="alert alert-danger">ERROR {{Session::get('error')}}</h6>
                                @endif
                                <h3 class="card-text d-inline-block"> Post Table - <span class="badge badge-success">{{$posts->count()}}</span> </h3>

                                <a href="{{route('author.post.create')}}" class="float-right btn btn-success btn-sm">Add Post</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped mb-0">
                                        <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Approval</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        @foreach($posts as $key => $post)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$post->title}}</td>
                                                <td>{{$post->user->name}}</td>
                                                <td>
                                                    <img style="width: 100px;height: 50px;" src="{{asset($post->image)}}" alt="{{$post->slug}}">
                                                </td>

                                                <td>
                                                    @if($post->status == 1)
                                                        <span class="badge badge-info">Published</span>
                                                    @else
                                                        <span class="badge badge-danger">Unpublished</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($post->is_approved == 1)
                                                        <span class="badge badge-info">Approved</span>
                                                    @else
                                                        <span class="badge badge-danger">Panding</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('author.post.show',$post->id)}}" class="btn btn-info btn-sm">Show</a>
                                                    <a href="{{route('author.post.edit',$post->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="{{route('author.post.destroy',$post->id)}}" onclick="event.preventDefault();
                                                    if (confirm('Are you sure to delete this ')){
                                                            document.getElementById('deleteFrom'+{{$post->id}}).submit();
                                                        }
                                                    "  class="btn btn-danger btn-sm">Delete</a>
                                                    <form id="deleteFrom{{$post->id}}" action="{{route('author.post.destroy',$post->id)}}" method="post">
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

