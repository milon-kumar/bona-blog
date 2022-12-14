@extends('Backend.master')

@section('title')
    All Authors || Milon Kumar
@endsection
@section('content')

    <div class="main-wrapper">

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Authors Tables</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Authors Tables</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card mb-0">
                            <div class="card-header">
                                @if(Session::has('success'))
                                    <h6 class="alert alert-success">SUCCESS {{Session::get('success')}}</h6>
                                @endif
                                <h3 class="card-text d-inline-block"> Authors Table </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped mb-0">
                                        <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                            <th>Post Count</th>
                                            <th>Favorite Post Count</th>
                                            <th>Comment Count</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($authors as $key => $author)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$author->name}}</td>
                                                <td><code>{{$author->email}}</code></td>
                                                <td>
                                                    <img style="width: 50px;height: 50px;border-radius: 50%; border: 1px solid white;"  src="{{asset($author->image)}}" alt="{{$author->name}}">
                                                </td>
                                                <td>{{$author->posts_count}}</td>
                                                <td>{{$author->fevorite_posts_count}}</td>
                                                <td>{{$author->comments_count}}</td>
                                                <td>
                                                    <a href="javascript:void(0)" onclick="event.preventDefault();
                                                    if(confirm('Are you Sure To Delete This ')){
                                                            document.getElementById('deleteFrom'+{{$author->id}}).submit();
                                                        }
                                                    "  class="btn btn-danger btn-sm">Delete</a>
                                                    <form id="deleteFrom{{$author->id}}" action="{{route('admin.author.delete',$author->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value="{{$author->id}}">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

