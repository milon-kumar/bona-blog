@extends('Frontend.master')

@section('title')
    All Blog || Milon Kumar
@endsection

@push('css')
    <link href="{{asset('/')}}assets/frontend/singlePost/styles.css" rel="stylesheet">

    <link href="{{asset('/')}}assets/frontend/singlePost/responsive.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/frontend/blank/styles.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/frontend/category/styles.css" rel="stylesheet">

    <link href="{{asset('/')}}assets/frontend/blank/responsive.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/frontend/category/responsive.css" rel="stylesheet">
    <style>
        svg{
            display: none;

        }
        span{
            display: none;
        }
        .hidden{
            display: none!important;
        }
        .relative{
            font-size: 25px;
        }
    </style>
@endpush

@section('content')
    <div class="slider display-table center-text">
        <img class="login_slider" src="{{asset($category->category_image)}}" alt="Blog Image">
        <h1 class="title display-table-cell "><b>{{$category->name}}</b></h1>
    </div><!-- slider -->
    <section class="blog-area section">
        <div class="container">

            <div class="row">
                @if($category->posts->count() > 0)

                @foreach($category->posts as $c_post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img style="width: 500px;height: 333px;" src="{{asset($c_post->image)}}" alt="{{$c_post->slug}}"></div>

                                <a class="avatar" href="{{route('authorProfile',$c_post->user->username)}}"><img  style="width: 57px;height: 62px;" src="{{asset($c_post->user->image)}}" alt="{{$c_post->user->name}}"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{route('singlePost',$c_post->slug)}}"><b>{{$c_post->title}}</b></a></h4>

                                    <ul class="post-footer">
                                        <li>
                                            @guest
                                                <a href="javascript:void(0)" onclick="alert('To Add To Favorite List.You Need To Login First.....!')">
                                                    <i class="ion-heart"></i>{{$c_post->favoriteToUsers->count()}}
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('favoriteId'+{{$c_post->id}}).submit();" class="{{!Auth::user()->fevorite_posts->where('pivot.post_id',$c_post->id)->count() == 0 ? 'favorite_post' : ''}}">
                                                    <i class="ion-heart"></i>{{$c_post->favoriteToUsers->count()}}
                                                </a>
                                                <form id="favoriteId{{$c_post->id}}" style="display: none;" action="{{route('post.favorite',$c_post->id)}}" method="post">
                                                    @csrf

                                                </form>
                                            @endguest

                                        </li>

                                        <li><a href="#"><i class="ion-chatbubble"></i>{{$c_post->comments->count()}}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{$c_post->view_count}}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforeach
                @else
                    <div class="col-lg-12 col-md-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1">
                                <div class="blog-info">
                                    <h1 class="title"><b class="text-capitalize">no post found...</b></h1>
                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div>
                @endif
            </div><!-- row -->

{{--            @if($categoriesByPost->links())--}}
{{--                <div class="load-more-btn" style="width: 35%; margin: 0 auto;">--}}
{{--                    {{$categoriesByPost->links()}}--}}
{{--                </div>--}}
{{--            @endif--}}

        </div><!-- container -->
    </section><!-- section -->

@endsection
