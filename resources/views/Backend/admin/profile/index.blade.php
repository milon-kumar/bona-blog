@extends('Backend.master')


@section('title')
    Profile || Milon Kumar
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                        @if(Session::has('success'))
                            <h6>SUCCESS {{Session::get('success')}}</h6>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#">
                                            @if(Auth::user()->image)
                                                <img alt="" src="{{asset(Auth::user()->image)}}">
                                            @else
                                                <img alt="" src="{{asset('backend/img/thumbbig-877470.png')}}">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{Auth::user()->name}}</h3>
                                                <h6 class="text-muted">{{Auth::user()->email}}</h6>
                                                <small class="text-muted">{{Auth::user()->username}}</small>
                                                <div class="staff-id">Employee ID : FT-{{Auth::id()}}</div>
                                                <div class="small doj text-muted">Date of Join : {{Auth::user()->created_at->toFormattedDateString()}}</div>
                                                <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Phone:</div>
                                                    <div class="text"><a href="">No Entry</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">User Name:</div>
                                                    <div class="text"><a href=""><code>{{Auth::user()->username}}</code></a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text"><a href=""><span class="__cf_email__" data-cfemail="a1cbcec9cfc5cec4e1c4d9c0ccd1cdc48fc2cecc">[{{Auth::user()->email}}&#160;]</span></a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Birthday:</div>
                                                    <div class="text"> No Entry Now </div>
                                                </li>
                                                <li>
                                                    <div class="title">About :</div>
                                                    <div class="text">{{Auth::user()->about}}</div>
                                                </li>
                                                <li>
                                                    <div class="title">Gender:</div>
                                                    <div class="text">No Entry</div>
                                                </li>
                                                <li>
                                                    <div class="title">Reports to:</div>
                                                    <div class="text">
                                                        <div class="avatar-box">
                                                            <div class="avatar avatar-xs">
                                                                <img src="{{asset('/')}}assets/backend/img/profiles/avatar-16.jpg" alt="">
                                                            </div>
                                                        </div>
                                                        <a href="profile.html">
                                                            Jeffery Lalor
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="profile_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Profile Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="false">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.update.profile')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img">
                                            @if(Auth::user()->image)
                                                <img alt="{{Auth::user()->name}}" src="{{asset(Auth::user()->image)}}">
                                            @else
                                                <img alt="{{Auth::user()->name}}" src="{{asset('backend/img/thumbbig-877470.png')}}">
                                            @endif
                                            <div class="fileupload btn">
                                                <span class="btn-text">edit</span>
                                                <input class="upload" type="file" name="image">
                                                @error('image')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                                                    @error('name')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                                                    @error('email')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>User About</label>
                                            <textarea name="about" class="form-control" id="" cols="30" rows="10">{{Auth::user()->about}}</textarea>
                                            @error('about')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Profile Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
