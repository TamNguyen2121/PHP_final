@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item "><a href="{{ route('post.index') }}">Post List</a></li>
            <li class="breadcrumb-item active">Create Posts</li>
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
                    <h3 class="card-title">Create Post</h3>
                    <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back to Create List</a>
                </div>
                </div>
                
                <div class="card-body p-0">

                <div class="row">
                  <div class="rol-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                <form action="{{route('post.store')}}" method="POST">
                  @csrf
                  <div class="card-body">
                    @include('includes.errors')
                  <div class="form-group">
                  <label for="name">Post title</label>
                  <input type="title" name="title" class="form-control" id="title" placeholder="Enter title" fdprocessedid="qqjxn7">
                  </div>
                  <div class="form-group">
                  <label for="location">Select Location</label>
                  <select name="location" id="location" class="form-control">
                    @foreach ($location as $l )
                    <option value="{{ $l->id }}">{{ $l->name }}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="image">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="description">Content</label>
                      <textarea name="description" id="description" rows="4" class="form-control"    placeholder="Enter description">
                      </textarea>
                      </div>
              
                  <div class="card-footer">
                  <button type="submit" class="btn btn-lg btn-primary" fdprocessedid="xtpjg">Submit</button>
                  </div>
                </div>
                  </form>
                </div>
              </div>
                </div>
                
                </div>
        </div>
      </div>
    </div>
   </div>

@endsection