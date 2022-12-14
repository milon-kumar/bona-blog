@extends('Backend.master')

@section('title')
    Edit Tag || Milon Kumar
@endsection

@section('content')

    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Tags Update Form</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Horizontal Form</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 d-flex offset-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Tag Update Form</h4>
                                @if(Session::has('success'))
                                    <h6 class="alert alert-success">SUCCESS {{Session::get('success')}}</h6>
                                @endif
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.tag.update',$tag->id)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <label for="tag" class="col-lg-3 col-form-label">Tag Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" id="tag" value="{{$tag->name}}" name="name" class="form-control">
                                            <input type="hidden" id="id" value="{{$tag->id}}" name="id" class="form-control">
                                            @error('name')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary ion-radio-waves">Update Tag</button>
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
