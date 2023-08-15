
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin_TravelExplorer</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin')}}/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('admin/dashboard') }}" class="nav-link active">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin')}}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TravelExplorer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        @if(!empty(Auth::guard('admin')->user()->image))
          <img src="{{ asset('admin/img/photos/'.Auth::guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image">
        @else
          <img src="{{ asset('admin')}}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('admin')->user()->username }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item ">
            <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active': '' }}">

              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item mt-auto ">

            <a href="{{ route('location.index') }}" class="nav-link {{ (request()->is('admin/location')) ? 'active': '' }} ">

              <i class="nav-icon fas fa-location-arrow"></i>
              <p>
                Locations 
              </p>
            </a>
          </li>
          <li class="nav-item mt-auto ">

            <a href="{{ route('Tag.index') }}" class="nav-link {{ (request()->is('admin/Tag')) ? 'active': '' }}">

              <i class="nav-icon fas fa-tag"></i>
              <p>
                Tags
              </p>
            </a>
          </li>
          <li class="nav-item mt-auto ">

            <a href="{{ route('post.index') }}" class="nav-link {{ (request()->is('admin/post')) ? 'active': '' }}">
              <i class="nav-icon fas fa-pen-nib"></i>
              <p>
                Posts
              </p>
            </a>
          </li>
          <li class="text-center mt-5">
            <a href="{{ route('website') }}" class="btn btn-primary text-white" target="_blank"> 
              <p class="mb-0">
                View Website

              </p>
            </a>
          </li>

          <li class="nav-item mt-auto ">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          <li class="nav-item mt-auto ">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-users"></i>
              <p>
                New Account
              </p>
            </a>
          </li>

          <li class="nav-item mt-auto">
          @if(Session::get('page')=="profile")
              @php $active="active" @endphp
          @else
              @php $active = "" @endphp
          @endif
            <a href="{{ url('admin/profile') }}" class="nav-link {{ $active }}">
            <i class="nav-icon fas fa-regular fa-address-book"></i>
              <p>
                Profile
              </p>
            </a>
          </li>

          <li class="nav-item mt-auto bg-danger mt-3">
              <a href="{{ url('admin/logout') }}" class="nav-link">
                <i class="nav-icon fas fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    {{-- <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> --}}
    <!-- Default to the left -->
    <strong>Group9 &copy; Admin <a href="https://www.instagram.com/travelexplorer/">TravelExplorer</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin')}}/js/adminlte.min.js"></script>
<script src="{{ asset('admin')}}/js/bs-custom-file-input.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('script')
<script>
  @if(Session::has('success'))
  toastr.success("{{ Session::get('success') }}");
  @endif

  $(document).ready(function () {
  bsCustomFileInput.init()
   })
</script>
</body>
</html>
