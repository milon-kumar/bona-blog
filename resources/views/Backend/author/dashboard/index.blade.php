@extends('Backend.master')

@section('title')
    Author Dashboard || Milon Kumar
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{Auth::user()->name}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-newspaper-o"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$posts->count()}}</h3>
                                <span>Total Post</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-heart"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{Auth::user()->fevorite_posts->count()}}</h3>
                                <span>Total Favorite</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-bookmark-o"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$pending_post}}</h3>
                                <span>Pending Post</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-fast-forward"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$all_view}}</h3>
                                <span>Total View</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Top 5 Popular Post Table</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap custom-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>Rank List</th>
                                        <th>Title</th>
                                        <th>Views</th>
                                        <th>Favorite</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($popular_posts as $key=> $post)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->view_count}}</td>
                                            <td>{{$post->favorite_to_users_count}}</td>
                                            <td>{{$post->comments_count}}</td>
                                            <td>
                                                @if($post->status == 1)
                                                <span class="badge bg-inverse-info">Published</span>
                                                @else
                                                    <span class="badge bg-inverse-danger">Unpublished</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="invoices.html">View all invoices</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
