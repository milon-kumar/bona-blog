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
                            <h3 class="page-title">Show Single Post</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Post Tables</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <img style="width: 100%; height: 350px;" src="{{asset($post->image)}}" alt="{{$post->slug}}">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card mb-0">
                            <div class="card-header">
                                <h3> ~~~ Post All Info ~~~ </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-stripped mb-0">
                                        <tr>
                                            <th>Sl Number : </th>
                                            <td>{{$post->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Post Title : </th>
                                            <td>{{$post->title}}</td>
                                        </tr>
                                        <tr>
                                            <th>Author : </th>
                                            <td>{{$post->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Created At : </th>
                                            <td>
                                                <span class="badge badge-warning">{{$post->created_at->toFormattedDateString()}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Updated At : </th>
                                            <td>
                                                <span class="badge badge-warning">{{$post->created_at}}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card mb-0">
                            <div class="card-header">
                                <h3 class="d-inline-block"> Category Tag And Status </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-stripped mb-0">
                                        <tr>
                                            <th>Category Name : </th>
                                            <td>
                                                @foreach($post->categories as $p_category)
                                                    {{$p_category->name}}
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tag Name : </th>
                                            <td>
                                                @foreach($post->tags as $p_category)
                                                    {{$p_category->name}}
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Publication Status : </th>
                                            <td>
                                                @if($post->status == 1)
                                                    <span class="badge badge-info">Published</span>
                                                @else
                                                    <span class="badge badge-danger">Unpublished</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Approval Status</th>
                                            <td>
                                                @if($post->is_approved)
                                                    <span class="badge badge-info">Approved</span>
                                                @else
                                                    <span class="badge badge-danger">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Post Slug</th>
                                            <td>
                                                <code>{{$post->slug}}</code>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h3>Post Body</h3>
                            </div>
                            <div class="card-body">
                                <p class="text-white">{!! $post->body !!}</p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-4 offset-4">
                                        <a href="{{route('admin.post.index')}}" class="btn btn-block btn-purple">Back To Post Table</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

