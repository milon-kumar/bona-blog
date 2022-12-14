@extends('Backend.master')

@section('title')
    Comments || Milon Kumar
@endsection
@section('content')

    <div class="main-wrapper">

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Comments Tables</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Comments Tables</li>
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
                                <h3 class="card-text d-inline-block"> Post Table - <span class="badge badge-success">{{$comments->count()}}</span> </h3>
                                 </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped mb-0">
                                        <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Comment Info</th>
                                            <th>Post Info</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        @foreach($comments as $key => $comment)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="">
                                                                <img class="media-object" style="width: 50px;height: 50px;border-radius: 50%; border: 1px solid white;" src="{{asset($comment->user->image)}}" alt="{{$comment->user->name}}">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading d-inline-block">{{$comment->user->name}} - on </h4><samll>{{$comment->created_at->diffForHumans()}}</samll>
                                                            <p>{{$comment->comment}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="media">
                                                        <div class="media-right">
                                                            <a target="_blank" href="{{route('singlePost',$comment->post->slug)}}">
                                                                <img style="width: 50px;height: 50px;border-radius: 50%; border: 1px solid white;" src="{{asset($comment->post->image)}}" alt="{{$comment->post->slug}}">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <a target="_blank" href="{{route('singlePost',$comment->post->slug)}}">
                                                                <h4>{{$comment->post->title}}</h4>
                                                            </a>
                                                            <p>By</p><small style="line-height: 0px;margin: 0;padding: 0px;">{{$comment->post->user->name}}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" onclick="event.preventDefault();
                                                        if (confirm('Are you sure to delete this ')){
                                                        document.getElementById('deleteFrom'+{{$comment->id}}).submit();
                                                        }
                                                        "  class="btn btn-danger btn-sm">Delete</a>
                                                    <form id="deleteFrom{{$comment->id}}" action="{{route('admin.comment.destroy',$comment->id)}}" method="post">
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

