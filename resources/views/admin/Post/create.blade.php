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
                  <div class="rol-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    @include('includes.errors')
                  <div class="form-group">
                  <label for="name">Post title</label>
                  <input type="title" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Enter title" fdprocessedid="qqjxn7">
                  </div>
                  {{-- <div class="form-group">
                    <label for="account_id">Post Account_id</label>
                    <input type="account_id" name="account_id" class="form-control" id="title" placeholder="Enter account_id" fdprocessedid="qqjxn7">
                    </div> --}}
                  <div class="form-group">
                  <label for="location">Post Location</label>
                  <select name="location" id="location" class="form-control" >
                    <option value="" style="display:none" selected>Select Location</option>
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
                    <div class="form-group ">
                      <label for="">Choose Post Tags</label>
                    <div class="d-flex flex-wrap">
                    @foreach ($Tag as $Tag )
                      <div class="custom-control custom-checkbox"style="margin-right:20px">
                        <input class="custom-control-input custom-control-input-danger custom-control-input-outline" name="Tag[]" type="checkbox" id="Tag{{ $Tag->id }}" value="{{ $Tag->id }}">
                        <label for="Tag{{ $Tag->id }}" class="custom-control-label">{{ $Tag->name }}</label>
                      </div>
                    @endforeach
                  </div>
                </div>
                    <div class="form-group">
                      <label for="content">Content</label>
                      <textarea name="content" id="content" rows="4" class="form-control"    placeholder="Enter content"> {{ old('content') }}
                      </textarea>
                      </div>
                    </div>
                  <div class="form-group offset-lg-10">
                  <button type="submit" class="btn btn-lg btn-primary" fdprocessedid="xtpjg">Submit</button>
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
    height: 100
  });
</script>
@endsection