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
   <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header ">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Edit Location - {{ $location->name }}</h3>
                    <a href="{{ route('location.index') }}" class="btn btn-primary">Go Back to Location List</a>
                </div>
                </div>
                
                <div class="card-body p-0">

                <div class="row">
                  <div class="rol-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                <form action="{{route('location.update',[$location->id])}}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    @include('includes.errors')
                  <div class="form-group">
                  <label for="name">Location name</label>
                  <input type="name" name="name" class="form-control" value="{{ $location->name }}" placeholder="Enter name" fdprocessedid="qqjxn7">
                  </div>
                  <div class="form-group">
                  <label for="address">Address</label>
                  <input type="address" name="address" class="form-control" value="{{ $location->Address }}" placeholder="Password" fdprocessedid="qbjbhf">
                  </div>
                  </div>
              
                  <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary" fdprocessedid="xtpjg">Update Location</button>
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