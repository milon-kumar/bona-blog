@extends('Backend.master')

@section('title')
    Favorite || Milon Kumar
@endsection
@section('content')

    <div class="main-wrapper">

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Favorite Tables</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Favorite Tables</li>
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
                                <h3 class="card-text d-inline-block"> Favorite Table - <sapn class="badge badge-success">{{$posts->count()}}</sapn></h3>
                                <a href="{{route('admin.tag.create')}}" class="float-right btn btn-success btn-sm">Add Tags</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped mb-0">
                                        <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Favorite</th>
                                            <th>Visibility</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $key => $post)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$post->title}}</td>
                                                <td>{{$post->user->name}}</td>
                                                <td>{{$post->favoriteToUsers->count()}}</td>
                                                <td>{{$post->view_count}}</td>

                                                <td>
                                                    <a href="" class="btn btn-info btn-sm">Show</a>
                                                    <a href="" onclick="event.preventDefault();
                                                        if (confirm('Are you sure to delete this ')){
                                                        document.getElementById('deleteFrom'+{{$post->id}}).submit();
                                                        }
                                                        "  class="btn btn-danger btn-sm">Remove</a>
                                                    <form id="deleteFrom{{$post->id}}" action="{{route('post.favorite',$post->id)}}" method="post">
                                                        @csrf
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
