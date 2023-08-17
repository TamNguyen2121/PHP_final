@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">View Message</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item "><a href="{{ route('post.index') }}">Message List</a></li>
            <li class="breadcrumb-item active">View Message</li>
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
                    <h3 class="card-title">View Message</h3>
                    <a href="{{ route('contact.index') }}" class="btn btn-primary">Go Back to Message List</a>
                </div>
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered table-primary" style='background-color: white;'>
                        <tbody>
                            <tr>
                                <th style='width: 200px'>Name</th>
                                <td>{{ $contact->name}}</td>
                            </tr>
                            <tr>
                                <th style='width: 200px'>Email</th>
                                <td>{{ $contact->email}}</td>
                            </tr>
                            <tr>
                                <th style='width: 200px'>Image</th>
                                <td>
                                <div class="col-4">
                                    <div style="max-width:200px; max-height:200px; overflow:hidden; text-align: center;">
                                        <img src="{{ asset($contact->image) }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <th style='width: 200px'>Message</th>
                                <td>{{ $contact->message}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
      </div>
    </div>
   </div>

@endsection