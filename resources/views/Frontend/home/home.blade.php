@extends('Frontend.master')

@section('title')
    Home || Milon Kumar
@endsection

@push('css')
    <link href="{{asset('/')}}assets/frontend/home/css/styles.css" rel="stylesheet">

    <link href="{{asset('/')}}assets/frontend/home/css/responsive.css" rel="stylesheet">
    <style>
        .favorite_post{
            color: blue;
        }
    </style>
@endpush

@section('content')
    <div class="main-slider">
        <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
             data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
             data-swiper-breakpoints="true" data-swiper-loop="true" >

            <div class="swiper-wrapper">
                @foreach($categories as $category)
                    <div class="swiper-slide">
                        <a class="slider-category" href="{{route('category.post',$category->slug)}}">
                            <div class="blog-image"><img style="width: 400px; height: 210px;" src="{{asset($category->category_image)}}" alt="Blog Image"></div>
                            <div class="category">
                                <div class="display-table center-text">
                                    <div class="display-table-cell">
                                        <h3><b>{{$category->name}}</b></h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <!-- swiper-slide -->

            </div><!-- swiper-wrapper -->

        </div><!-- swiper-container -->

    </div><!-- slider -->
    <div class="row">
        <div class="col-md-6 offset-3">
            @if(Session::has('status'))
                <h6 id="homeAlart" class="alert alert-success text-center my-3">{{Session::get('status')}}</h6>
            @endif
        </div>
    </div>

    <section class="blog-area section">
        <div class="container">

            <div class="row">

                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img style="width: 500px;height: 333px;" src="{{asset($post->image)}}" alt="{{$post->slug}}"></div>

                                <a class="avatar" href="{{route('authorProfile',$post->user->username)}}"><img style="width: 57px;height: 62px;" src="{{asset($post->user->image)}}" alt="{{$post->user->name}}"></a>

                                <div class="blog-info">

                                    <h4 class="title">
                                        <a href="{{route('singlePost',$post->slug)}}"><b>{{$post->title}}</b>
                                        </a>

                                    </h4>

                                    <ul class="post-footer">

                                        <li>
                                            @guest
                                                <a href="javascript:void(0)" onclick="alert('To Add To Favorite List.You Need To Login First.....!')">
                                                    <i class="ion-heart"></i>{{$post->favoriteToUsers->count()}}
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('favoriteId'+{{$post->id}}).submit();" class="{{!Auth::user()->fevorite_posts->where('pivot.post_id',$post->id)->count() == 0 ? 'favorite_post' : ''}}">
                                                    <i class="ion-heart"></i>{{$post->favoriteToUsers->count()}}
                                                </a>
                                                <form id="favoriteId{{$post->id}}" style="display: none;" action="{{route('post.favorite',$post->id)}}" method="post">
                                                    @csrf

                                                </form>
                                            @endguest

                                        </li>

                                        <li><a href="#"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div>
                @endforeach
                <!-- col-lg-4 col-md-6 -->
            </div><!-- row -->

            <a class="load-more-btn" href="{{route('allPost')}}"><b>LOAD MORE</b></a>

        </div><!-- container -->
    </section><!-- section -->
@endsection

@push('js')

@endpush
