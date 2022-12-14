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
        <img class="login_slider" src="{{asset('/')}}assets/frontend/images/category-1.jpg" alt="Blog Image">
        <h1 class="title display-table-cell "><b>All Post</b></h1>
    </div><!-- slider -->
    <section class="blog-area section">
        <div class="container">

            <div class="row">
                @foreach($all_posts as $a_post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="{{$a_post->image}}" alt="{{$a_post->slug}}"></div>

                                <a class="avatar" href="{{route('authorProfile',$a_post->user->username)}}"><img src="{{$a_post->user->image}}" alt="{{$a_post->user->name}}"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{route('singlePost',$a_post->slug)}}"><b>{{$a_post->title}}</b></a></h4>

                                    <ul class="post-footer">
                                        <li>
                                            @guest
                                                <a href="javascript:void(0)" onclick="alert('To Add To Favorite List.You Need To Login First.....!')">
                                                    <i class="ion-heart"></i>{{$a_post->favoriteToUsers->count()}}
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('favoriteId'+{{$a_post->id}}).submit();" class="{{!Auth::user()->fevorite_posts->where('pivot.post_id',$a_post->id)->count() == 0 ? 'favorite_post' : ''}}">
                                                    <i class="ion-heart"></i>{{$a_post->favoriteToUsers->count()}}
                                                </a>
                                                <form id="favoriteId{{$a_post->id}}" style="display: none;" action="{{route('post.favorite',$a_post->id)}}" method="post">
                                                    @csrf

                                                </form>
                                            @endguest

                                        </li>

                                        <li><a href="#"><i class="ion-chatbubble"></i>{{$a_post->comments->count()}}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{$a_post->view_count}}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforeach

            </div><!-- row -->

            @if($all_posts->links())
                <div class="load-more-btn" style="width: 35%; margin: 0 auto;">
                    {{$all_posts->links()}}
                </div>
            @endif

        </div><!-- container -->
    </section><!-- section -->

@endsection
