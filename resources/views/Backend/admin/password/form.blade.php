@extends('Backend.master')

@section('title')
        Changed Passwrod || Milon Kumar
@endsection

@section('content')

    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Change Password Form</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Changed Password Form</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 d-flex offset-2">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Changed Password Form</h4>
                                @if(Session::has('success'))
                                    <h6 class="alert alert-success">SUCCESS {{Session::get('success')}}</h6>
                                @endif
                                @if(Session::has('warning'))
                                    <h6 class="alert alert-warning">Warning {{Session::get('warning')}}</h6>
                                @endif
                                @if(Session::has('error'))
                                    <h6 class="alert alert-danger">Error {{Session::get('error')}}</h6>
                                @endif
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.password.check')}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="old_password" class="col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-lg-9">
                                            <input type="password" id="old_password" name="old_password" class="form-control">
                                            @error('old_password')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-lg-3 col-form-label">New Password</label>
                                        <div class="col-lg-9">
                                            <input type="password" id="password" name="password" class="form-control">
                                            @error('password')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="confirm_password" class="col-lg-3 col-form-label">Confirm Password</label>
                                        <div class="col-lg-9">
                                            <input type="password" id="confirm_password" name="password_confirmation" class="form-control">
                                            @error('password_confirmation')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary ion-radio-waves">Changed Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
