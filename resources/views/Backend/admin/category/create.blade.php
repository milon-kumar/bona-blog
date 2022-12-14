@extends('Backend.master')

@section('title')
    Add Category || Milon Kumar
@endsection

@section('content')

    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Category Form</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Category Form</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 d-flex offset-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Category Form</h4>
                                @if(Session::has('success'))
                                    <h6 class="alert alert-success">SUCCESS {{Session::get('success')}}</h6>
                                @endif
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="tag" class="col-lg-3 col-form-label">Category Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" id="tag" name="name" class="form-control">
                                            @error('name')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category_image" class="col-lg-3 col-form-label">Category Image</label>
                                        <div class="col-lg-9">
                                            <input type="file" id="image" name="category_image" class="form-control">
                                            @error('category_image')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="banner_image" class="col-lg-3 col-form-label">Banner Image</label>
                                        <div class="col-lg-9">
                                            <input type="file" id="banner_image" name="banner_image" class="form-control">
                                            @error('banner_image')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary ion-radio-waves">Save Category</button>
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
