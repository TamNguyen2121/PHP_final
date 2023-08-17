@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Profile Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  
<!-- Main content -->
<section class="content">
  @if(Session::has('error_message'))  
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error:</strong> {{ Session::get('error_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(Session::has('success_message'))  
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success:</strong> {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ url('admin/profile') }}" enctype="multipart/form-data">@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="admin_email">Email address</label>
                    <input class="form-control" id="admin_email" value="{{ Auth::guard('admin')->user()->email }}" readonly='' style="background-color:aliceblue ">
                  </div>
                  <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name" value="{{ Auth::guard('admin')->user()->username }}">
                  </div>
                  <div class="form-group">
                    <label for="phone_num">Phone Number</label>
                    <input type="text" class="form-control" name="phone_num" id="phone_num" placeholder="Phone Number" value="{{ Auth::guard('admin')->user()->mobile }}">
                  </div>
                  <div class="form-group">
                    <label for="admin_image">Photo</label>
                    <input type="file" class="form-control" name="admin_image" id="admin_image">
                    @if(!empty(Auth::guard('admin')->user()->image))
                    <a target="_blank" href="{{ url('admin/img/photos/'.Auth::guard('admin')->user()->image) }}">View Photo</a>
                    <input type="hidden" name="current_image" value="{{ Auth::guard('admin')->user()->image}}">
                    @endif
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>

          <!--/.col (right) -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit User Info</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form method="post" action="{{ url('admin/edituser') }}" enctype="multipart/form-data">@csrf
                <div class="card-body">
                  <!-- <div class="form-group">
                    <label for="admin_email">Email address</label>
                    <input class="form-control" id="admin_email" value="{{ Auth::guard('admin')->user()->email }}" readonly='' style="background-color:aliceblue ">
                  </div> -->
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ Auth::guard('admin')->user()->name }}">
                  </div>
                  <div class="form-group">
                  <div class="form-group">
                    <label for="name">Gender</label><br>
                    <input type="radio" name="gender" value="1" {{ Auth::guard('admin')->user()->gender == 1 ? 'checked' : '' }}>
                    <label for="male">Male</label><br>
                    <input type="radio" name="gender" value="2" {{ Auth::guard('admin')->user()->gender == 2 ? 'checked' : '' }}>
                    <label for="male">Female</label><br>
                  </div>
                  <div class="form-group">
                    <label for="birthday">Birthday:</label>
                    <input type="date" class="form-control" id="birthday" name="birthday">
                  </div>
                  <div class="form-group">
                    <label for="account_id">Account_Id</label>
                    <input type="text" class="form-control" name="account_id" id="account_id" placeholder="Name" value="{{ Auth::guard('admin')->user()->id }}">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  
  </div>
@endsection