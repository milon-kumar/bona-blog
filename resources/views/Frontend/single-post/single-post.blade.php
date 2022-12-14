@extends('Frontend.master')

@section('title')
    Single Blog || Milon Kumar
@endsection

@push('css')
    <link href="{{asset('/')}}assets/frontend/singlePost/styles.css" rel="stylesheet">

    <link href="{{asset('/')}}assets/frontend/singlePost/responsive.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/frontend/blank/styles.css" rel="stylesheet">

    <link href="{{asset('/')}}assets/frontend/blank/responsive.css" rel="stylesheet">
    <style>
        .favorite_post{
            color: blue;
        }
    </style>
@endpush

@section('content')
    <div class="slider display-table center-text">
        <img class="login_slider" src="{{asset($post->image)}}" alt="Blog Image">
        <h1 class="title display-table-cell "><b>Single Post</b></h1>
    </div><!-- slider -->

<section class="post-area section">
    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-md-12 no-right-padding">

                <div class="main-post">

                    <div class="blog-post-inner">

                        <div class="post-info">

                            <div class="left-area">
                                <a class="avatar" href="{{route('authorProfile',$post->user->username)}}"><img src="{{asset($post->user->image)}}" alt="{{$post->title}}" ></a>
                            </div>

                            <div class="middle-area">
                                <a class="name" href="{{route('authorProfile',$post->user->username)}}"><b>{{$post->user->name}}</b></a>
                                <h6 class="date">on {{$post->created_at->diffForHumans()}}</h6>
                            </div>

                        </div><!-- post-info -->

                        <h3 class="title"><a href="#"><b>{{$post->title}}</b></a></h3>

                        <div class="para">
                            {!! html_entity_decode($post->body) !!}
                        </div>

                        <ul class="tags">
    `                   @foreach($tags as $tag)
                            <li><a href="{{route('tagByPost',$tag->slug)}}">{{$tag->name}}</a></li>
                        @endforeach
                        </ul>
                    </div><!-- blog-post-inner -->

                    <div class="post-icons-area">
                        <ul class="post-icons">
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

                        <ul class="icons">
                            <li>SHARE : </li>
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div><!-- main-post -->
            </div><!-- col-lg-8 col-md-12 -->

            <div class="col-lg-4 col-md-12 no-left-padding">

                <div class="single-post info-area">

                    <div class="sidebar-area about-area">
                        <h4 class="title"><b>ABOUT AUTHOR</b></h4>
                        <p>{{$post->user->about}}</p>
                    </div>

                    <div class="tag-area">

                        <h4 class="title"><b>CATEGORY CLOUD</b></h4>
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="{{route('category.post',$category->slug)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>

                    </div><!-- subscribe-area -->

                </div><!-- info-area -->

            </div><!-- col-lg-4 col-md-12 -->

        </div><!-- row -->

    </div><!-- container -->
</section><!-- post-area -->


<section class="recomended-area section">
    <div class="container">
        <div class="row">
        @foreach($randomPost as $r_post)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img style="width: 500px;height: 280px;" src="{{asset($r_post->image)}}" alt="Blog Image"></div>

                        <a class="avatar" href="#"><img style="width: 57px;height: 62px;"  src="{{asset($r_post->user->image)}}" alt="Profile Image"></a>

                        <div class="blog-info">

                            <h4 class="title"><a href="{{route('singlePost',$r_post->slug)}}"><b>{{$r_post->title}}</b></a></h4>

                            <ul class="post-footer">
                                <li>
                                    @guest
                                        <a href="javascript:void(0)" onclick="alert('To Add To Favorite List.You Need To Login First.....!')">
                                            <i class="ion-heart"></i>{{$r_post->favoriteToUsers->count()}}
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('favoriteId'+{{$r_post->id}}).submit();" class="{{!Auth::user()->fevorite_posts->where('pivot.post_id',$r_post->id)->count() == 0 ? 'favorite_post' : ''}}">
                                            <i class="ion-heart"></i>{{$r_post->favoriteToUsers->count()}}
                                        </a>
                                        <form id="favoriteId{{$r_post->id}}" style="display: none;" action="{{route('post.favorite',$r_post->id)}}" method="post">
                                            @csrf

                                        </form>
                                    @endguest

                                </li>

                                <li><a href="#"><i class="ion-chatbubble"></i>{{$r_post->comments->count()}}</a></li>
                                <li><a href="#"><i class="ion-eye"></i>{{$r_post->view_count}}</a></li>
                            </ul>

                        </div><!-- blog-info -->
                    </div><!-- single-post -->
                </div><!-- card -->
            </div>
        @endforeach
            <!-- col-md-6 col-sm-12 --><!-- col-md-6 col-sm-12 -->

        </div><!-- row -->

    </div><!-- container -->
</section>

<section class="comment-section">
    <div class="container">
        <h4><b>POST COMMENT</b></h4>
        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="comment-form">
                    @guest
                        <p class="text-capitalize">for post a new comment . first need to <a href="{{route('login')}}">login</a> first</p>
                    @else
                        <form action="{{route('comment.store',$post->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="m-auto">
                                    @if(Session::has('success'))
                                        <span class="alert alert-success">SUCCESS {{Session::get('success')}}</span>
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                        <textarea name="comment" rows="2" class="text-area-messge form-control"
                                                  placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                                </div><!-- col-sm-12 -->
                                @error('comment')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                                <div class="col-sm-12">
                                    <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                                </div><!-- col-sm-12 -->

                            </div><!-- row -->
                        </form>
                    @endguest
                </div><!-- comment-form -->

                <h4><b>COMMENTS - ({{$post->comments->count()}})</b></h4>
<!-- commnets-area -->
                @if($post->comments->count() > 0)
                @foreach($post->comments as $comment)
                <div class="commnets-area ">
                    <div class="comment">
                        <div class="post-info">
                            <div class="left-area">
                                <a class="avatar" href="#"><img src="{{asset($comment->user->image)}}" alt="Profile Image"></a>
                            </div>
                            <div class="middle-area">
                                <a class="name" href="#"><b>{{$comment->user->name}}</b></a>
                                <h6 class="date">on {{$comment->created_at->diffForHumans()}}</h6>
                            </div>
                        </div><!-- post-info -->
                        <p>{{$comment->comment}}</p>
                    </div>
                </div>
                    <!-- commnets-area -->
                @endforeach
                @else
                    <div class="commnets-area ">
                        <h3 class="para text-capitalize">no comment found</h3>
                    </div>
                @endif
                <a class="more-comment-btn" href="#"><b>VIEW MORE COMMENTS</b></a>

            </div><!-- col-lg-8 col-md-12 -->

        </div><!-- row -->

    </div><!-- container -->
</section>

@endsection
