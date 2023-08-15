@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
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
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-info">
    <div class="inner">
    <h3>{{ $postCount }}</h3>
    <p>Post</p>
    </div>
    <div class="icon">
    <i class="fas fa-pen-square"></i>
    </div>
    
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-success">
    <div class="inner">
    <h3> {{ $locationCount }} </h3>
    <p>Locations</p>
    </div>
    <div class="icon">
    <i class="ion fas fa-location-arrow"></i>
    </div>
    
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-warning">
    <div class="inner">
    <h3>{{ $tagCount }}</h3>
    <p>Tags</p>
    </div>
    <div class="icon">
    <i class="fas fa-tag"></i>
    </div>
    
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-danger">
    <div class="inner">
    <h3>{{ $userCount }}</h3>
    <p>User</p>
    </div>
    <div class="icon">
    <i class=" fas fa-user"></i>
    </div>
    
    </div>
    </div>
    
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header ">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Post List</h3>
                <a href="{{ route('post.index') }}" class="btn btn-primary">Post List</a>
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
            <th>Tags</th>
            <th>Author</th>
            <th>Created Date</th>
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
            <td>{{ $post->location->name }}</td>
            <td>
              @foreach($post->Tag as $T)
              <span class="badge badge-primary"> {{ $T->name }} </span>
              @endforeach
              
            </td>
            <td>{{ $post->account->username }}</td>
            <td>{{ $post->created_at->format('d M,Y') }}</td>
            <td class="d-flex">
              <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
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
@endsection