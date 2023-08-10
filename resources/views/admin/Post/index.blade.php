@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Posts</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item active">Posts list</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
   <!-- Main content -->
   <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header ">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Post List</h3>
                    <a href="{{ route('post.create') }}" class="btn btn-primary">Create post</a>
                </div>
                </div>
                
                <div class="card-body p-0">
                <table class="table table-sm">
                <thead>
                <tr>
                <th style="width: 10px">#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Location</th>
                <th>Author</th>
                <th style="width: 40px">Action</th>
                </tr>
                </thead>
                <tbody>
                  @if($post->count())
                @foreach($post as $post)
                <tr>
                <td>{{ $post->id }}</td>
                <td>
                  <div style="max-width:70px; max-height:70px; overflow:hidden">
                    <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
                  </div>
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->location_id }}</td>
                <td>{{ $post->user_id }}</td>
                <td class="d-flex">
                  <a href="{{ route('post.edit', [$post->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                  <form action="{{ route('post.destroy',[$post->id])}}" class="mr-1" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i></button>
                  </form>
                </td>
            
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="5">
                    <h5 class="text-center">No posts found.</h5>
                  </td>
                </tr>

                @endif
                </tbody>
                </table>
                </div>
                
                </div>
        </div>
      </div>
    </div>
   </div>

@endsection