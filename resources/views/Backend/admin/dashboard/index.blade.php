@extends('Backend.master')

@section('title')
    Admin Dashboard || Milon Kumar
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
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
                            <span class="dash-widget-icon text-primary"><i class="fa fa-bookmark-o"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$posts->count()}}</h3>
                                <h5 class="text-uppercase">Total Post</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon text-success"><i class="fa fa-calendar-times-o"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$category_count}}</h3>
                                <h5 class="text-uppercase">Total Category</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon text-info"><i class="fa fa-tag"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$tag_count}}</h3>
                                <h5 class="text-uppercase">Total Tag</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon text-danger"><i class="fa fa-user"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$author_count}}</h3>
                                <h5 class="text-uppercase">Total Author</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-group m-b-30">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <span class="d-block text-uppercase">Total Favorites</span>
                                    </div>
                                    <div>
                                        <span class="text-success"><i class="fa fa-heart"></i></span>
                                    </div>
                                </div>
                                <h3 class="mb-3">{{Auth::user()->fevorite_posts->count()}}</h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <span class="d-block text-uppercase">Pending Post</span>
                                    </div>
                                    <div>
                                        <span class="text-warning"><i class="fa fa-pencil-square"></i></span>
                                    </div>
                                </div>
                                <h3 class="mb-3">{{$total_pending_post}}</h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <span class="d-block text-uppercase">Total View</span>
                                    </div>
                                    <div>
                                        <span class="text-info"><i class="fa fa-street-view"></i></span>
                                    </div>
                                </div>
                                <h3 class="mb-3">{{$view_count}}</h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <span class="d-block text-uppercase">New Author Today</span>
                                    </div>
                                    <div>
                                        <span class="text-danger"><i class="fa fa-user-circle-o"></i></span>
                                    </div>
                                </div>
                                <h3 class="mb-3">{{$new_author_today}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Most Popular Post</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap custom-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Total Views</th>
                                        <th>Favorite</th>
                                        <th>Comments</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($popular_post as $key => $post)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->user->name}}</td>
                                            <td>{{$post->view_count}}</td>
                                            <td>{{$post->favorite_to_users_count}}</td>
                                            <td>{{$post->comments_count}}</td>
                                            <td>
                                                @if($post->status == 1)
                                                <span class="badge bg-inverse-success">Published</span>
                                                @else
                                                <span class="badge bg-inverse-danger">Unpublished</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('singlePost',$post->slug)}}" target="_blank" class="btn btn-info btn-sm ion-radio-waves">View</a>
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


            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Top 10 Active Authors</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-nowrap custom-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Post</th>
                                        <th>Comments</th>
                                        <th>Favorite</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($active_user as $key => $user)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>
                                                <img style="width: 50px;height: 50px;border-radius: 50%; border: 1px solid white;" src="{{asset($user->image)}}" alt="{{$user->name}}">
                                            </td>
                                            <td>{{$user->posts_count}}</td>
                                            <td>{{$user->comments_count}}</td>
                                            <td>{{$user->fevorite_posts_count}}</td>
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
@endsection
