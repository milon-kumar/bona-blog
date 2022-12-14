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
        <img class="login_slider" src="{{asset('assets/frontend/images/slider-1.jpg')}}" alt="Blog Image">
        <h1 class="title display-table-cell "><b>{{$tags->name}}</b></h1>
    </div><!-- slider -->
    <section class="blog-area section">
        <div class="container">

            <div class="row">
                @if($tags->posts->count() > 0)

                @foreach($tags->posts as $t_post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img style="width: 500px;height: 333px;" src="{{asset($t_post->image)}}" alt="{{$t_post->slug}}"></div>

                                <a class="avatar" href="{{route('authorProfile',$t_post->user->username)}}"><img  style="width: 57px;height: 62px;" src="{{asset($t_post->user->image)}}" alt="{{$t_post->user->name}}"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{route('singlePost',$t_post->slug)}}"><b>{{$t_post->title}}</b></a></h4>

                                    <ul class="post-footer">
                                        <li>
                                            @guest
                                                <a href="javascript:void(0)" onclick="alert('To Add To Favorite List.You Need To Login First.....!')">
                                                    <i class="ion-heart"></i>{{$t_post->favoriteToUsers->count()}}
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('favoriteId'+{{$t_post->id}}).submit();" class="{{!Auth::user()->fevorite_posts->where('pivot.post_id',$t_post->id)->count() == 0 ? 'favorite_post' : ''}}">
                                                    <i class="ion-heart"></i>{{$t_post->favoriteToUsers->count()}}
                                                </a>
                                                <form id="favoriteId{{$t_post->id}}" style="display: none;" action="{{route('post.favorite',$t_post->id)}}" method="post">
                                                    @csrf

                                                </form>
                                            @endguest

                                        </li>

                                        <li><a href="#"><i class="ion-chatbubble"></i>{{$t_post->comments->count()}}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{$t_post->view_count}}</a></li>
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
