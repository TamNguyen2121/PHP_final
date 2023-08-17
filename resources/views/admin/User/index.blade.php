@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if(Session::has('success_message'))  
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success:</strong> {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">   
              <div class="card-header">
                <h3 class="card-title">User Page</h3>
                <a href="{{ url('admin/add-edit-subadmin')}}" style="max-width: 150px; float: right; display: inline-block;" class="btn btn-block btn-primary">Add New Account</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="subadmins" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Created on</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($subadmins as $subadmin) 
                  <tr>
                    <td>{{ $subadmin->id }}</td>
                    <td>{{ $subadmin->username }}</td>
                    <td>{{ $subadmin->mobile }}</td>
                    <td>{{ $subadmin->email }}</td>
                    <td>{{ $subadmin->type }}</td>
                    <td>{{ date("F j, Y, g:i a", strtotime($subadmin->created_at)) }}</td>
                    <td>
                      &nbsp;
                      @if($subadmin->status==1)
                      <a class="updateSubadminStatus" id="subadmin-{{ $subadmin->id}}" subadmin_id="{{$subadmin->id}}" style='color:blue'
                       href="javascript:void(0)"><i class="fas fa-solid fa-toggle-on" status="Active"></i></a>
                       @else
                       <a class="updateSubadminStatus" id="subadmin-{{ $subadmin->id}}" subadmin_id="{{$subadmin->id}}" style='color:grey'
                       href="javascript:void(0)"><i class="fas fa-solid fa-toggle-off" status="Inactive"></i></a>
                       @endif
                      &nbsp;&nbsp;
                      <a class="confirmDelete" name="Subadmin" title="Delete Subadmin" style="color:blue;" href="javascript:void(0)"
                      record="subadmin" recordid="{{ $subadmin->id }}" <?php 
                      ?>><i class="fas fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection