@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Tags</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item "><a href="{{ route('Tag.index') }}">Tag List</a></li>
            <li class="breadcrumb-item active">Edit Tag</li>
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
                    <h3 class="card-title">Edit Tag - {{ $Tag->name }}</h3>
                    <a href="{{ route('Tag.index')}}" class="btn btn-primary">Go Back to Location List</a>
                </div>
                </div>
                
                <div class="card-body p-0">

                <div class="row">
                  <div class="rol-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                    <form action="{{ route('Tag.update', [$Tag->id]) }}" method="POST">

                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    @include('includes.errors')
                  <div class="form-group">
                  <label for="name">Tag name</label>
                  <input type="name" name="name" class="form-control" value="{{ $Tag->name }}" placeholder="Enter name" fdprocessedid="qqjxn7">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="4" class="form-control"    placeholder="Enter description" > {{ $Tag->description }}
                    </textarea>
                  
                    </div>
                  </div>
              
                  <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary" fdprocessedid="xtpjg">Update Tag</button>
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