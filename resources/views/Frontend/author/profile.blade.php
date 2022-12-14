@extends('Frontend.master')

@section('title')
     Blog || Milon Kumar
@endsection

@push('css')
    <link href="{{asset('/')}}assets/frontend/singlePost/styles.css" rel="stylesheet">

    <link href="{{asset('/')}}assets/frontend/singlePost/responsive.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/frontend/blank/styles.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/frontend/categorysidebar/styles.css" rel="stylesheet">

    <link href="{{asset('/')}}assets/frontend/blank/responsive.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/frontend/categorysidebar/responsive.css" rel="stylesheet">
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
        .porfileImage{
            height: 190px;
            width: 150px;
            margin: 0px 65px auto;
            border: 3px solid;
        }
    </style>
@endpush

@section('content')
    <div class="slider display-table center-text">
        <img class="login_slider" style="width: 100% !important; height: 350px!important;" src="{{asset('/')}}assets/frontend/images/slider-1.jpg" alt="Blog Image">
        <h1 class="title display-table-cell "><b>Welcome To {{$author->name}} Profile</b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        @if($post->count())
                        @foreach($post as $item)
                            <div class="col-md-6 col-sm-12">
                                <div class="card h-100">
                                    <div class="single-post post-style-1">

                                        <div class="blog-image"><img src="{{asset($item->image)}}" alt="{{$item->slug}}"></div>

                                        <a class="avatar" href="{{route('authorProfile',$item->user->username)}}"><img src="{{asset($item->user->image)}}" alt="{{$item->user->name}}"></a>

                                        <div class="blog-info">

                                            <h4 class="title"><a  href="{{route('singlePost',$item->slug)}}"><b>{{$item->title}}</b></a></h4>

                                            <ul class="post-footer">
                                                <li>
                                                    @guest
                                                        <a href="javascript:void(0)" onclick="alert('To Add To Favorite List.You Need To Login First.....!')">
                                                            <i class="ion-heart"></i>{{$item->favoriteToUsers->count()}}
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('favoriteId'+{{$item->id}}).submit();" class="{{!Auth::user()->fevorite_posts->where('pivot.post_id',$item->id)->count() == 0 ? 'favorite_post' : ''}}">
                                                            <i class="ion-heart"></i>{{$item->favoriteToUsers->count()}}
                                                        </a>
                                                        <form id="favoriteId{{$item->id}}" style="display: none;" action="{{route('post.favorite',$item->id)}}" method="post">
                                                            @csrf

                                                        </form>
                                                    @endguest

                                                </li>

                                                <li><a href="#"><i class="ion-chatbubble"></i>{{$item->comments->count()}}</a></li>
                                                <li><a href="#"><i class="ion-eye"></i>{{$item->view_count}}</a></li>
                                            </ul>

                                        </div><!-- blog-info -->
                                    </div><!-- single-post -->
                                </div><!-- card -->
                            </div>
                        @endforeach<!-- col-md-6 col-sm-12 -->
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

                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 ">

                    <div class="single-post info-area ">
                        <div class="about-area">
                            <h3 class="title"><b>ABOUT AUTHOR</b></h3>
                            <div class="img-fluid">
                                <img class="porfileImage" src="{{asset($author->image)}}" alt="{{$author->name}}">
                            </div>
                            <h4>Author Name : {{$author->name}}</h4>
                            <p>About Author : {{$author->about}}</p>
                            <p><b>Author Since : {{$author->created_at->toDateString()}}</b></p>
                            <strong>Total Post : {{$author->posts->count()}}</strong>
                        </div>

                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- section -->

@endsection
