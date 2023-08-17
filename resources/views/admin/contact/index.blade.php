@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Messages</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item active">Message list</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

<!-- SEARCH FORM -->
<form class="form-inline ml-3" action="" method="GET">
<div class="input-group input-group-sm">
  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="messageKey">
  <div class="input-group-append">
    <button class="btn btn-primary" type="submit">
      <i class="fas fa-search"></i>
    </button>
  </div>
</div>
</form>
<br>
  <!-- /.content-header -->
   <!-- Main content -->
   <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header ">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Message List</h3>
                    <!-- <a href="{{ route('post.create') }}" class="btn btn-primary">Create post</a> -->
                </div>
                </div>
                
                <div class="card-body p-0">
                <table class="table table-sm">
                <thead>
                <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Message</th>
                <th style="width: 40px">Action</th>
                </tr>
                </thead>
                <tbody>
                  @if($messages->count())
                @foreach($messages as $message)
                <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->image }}</td>
                <td>{{ Str::limit($message->message, 120, '...') }}</td>

                <td class="d-flex">
                <a href="{{ route('contact.show', ['id' => $message->id]) }}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                  <form action="{{ route('contact.destroy',['id' => $message->id])}}" class="mr-1" method="POST">
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
   </div>

@endsection