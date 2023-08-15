@extends('layouts.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Location</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
          <li class="breadcrumb-item "><a href="{{ route('location.index') }}">Location List</a></li>
          <li class="breadcrumb-item active">Edit Locations</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
  <!-- /.content-header -->
   <!-- Main content -->
   <div class="content  ">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header ">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Edit Post </h3>
                    <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back to post List</a>
                </div>
                </div>
                
                <div class="card-body p-0">

                <div class="row">
                  <div class="rol-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                      <form action="{{ route('post.update', [$post->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      @include('includes.errors')
                    <div class="form-group">
                    <label for="name">Post title</label>
                    <input type="title" name="title" value="{{ $post->title }}" class="form-control" id="title" placeholder="Enter title" fdprocessedid="qqjxn7">
                    </div>
                    <div class="form-group">
                    <label for="location">Post Location</label>
                    <select name="location" id="location" class="form-control" >
                      <option value="" style="display:none" selected>Select Location</option>
                      @foreach ($location as $l )
                      <option value="{{ $l->id }}" @if($post->location_id == $l->id) selected @endif >{{ $l->name }}</option>
                      @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                      <div class="row ">
                        <div class="col-8">
                          <label for="image">Image</label>
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image" >Choose file</label>
                            </div>
                        </div>
                        <div class="col-4">
                          <div style="max-width:200px; max-height:150px; overflow:hidden; margin-left:auto">
                            <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
                          </div>
                        </div>
                        
                      </div>
                      <div class="form-group">
                        <label for="">Choose Post Tags</label>
                        <div class="d-flex flex-wrap">
                        @foreach ($Tag as $Tag )
                          <div class="custom-control custom-checkbox" style="margin-right:20px">
                            <input class="custom-control-input custom-control-input-danger custom-control-input-outline" name="Tag[]" type="checkbox" id="Tag{{ $Tag->id }}" value="{{ $Tag->id }}" 
                            @foreach ( $post->Tag as $T )
                            @if($Tag->id == $T->id) checked @endif
                            @endforeach>
                            <label for="Tag{{ $Tag->id }}" class="custom-control-label">{{ $Tag->name }}</label>
                          </div>
                        @endforeach
                      </div>
                      </div>
                      </div>
                      <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="4" class="form-control"    placeholder="Enter content"> {{ $post->content }}
                        </textarea>
                        </div>
                        <div class="form-group ">
                          <button type="submit" class="btn btn-lg btn-primary" fdprocessedid="xtpjg">Update Post</button>
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

@section('style')
<link rel="stylesheet" href="{{ asset('/admin/css/summernote-bs4.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('/admin/js/summernote-bs4.min.js')}}"></script>
<script>
  $('#content').summernote({
    placeholder: 'Hello Bootstrap 4',
    tabsize: 2,
    height: 300
  });
</script>
@endsection