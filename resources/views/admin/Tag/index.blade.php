@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tags</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item active">Tag list</li>
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
                    <h3 class="card-title">Tag List</h3>
                    <a href="{{ route('Tag.create') }}" class="btn btn-primary">Create Tag</a>
                </div>
                </div>
                
                <div class="card-body p-0">
                <table class="table table-sm">
                <thead>
                <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Post Count</th>
                <th style="width: 40px">Action</th>
                </tr>
                </thead>
                <tbody>
                  @if($Tag->count())
                @foreach($Tag as $Tag)
                <tr>
                <td>{{ $Tag->id }}</td>
                <td>{{ $Tag->name }}</td>
                <td>{{ $Tag->Address }}</td>
                <td>
                  {{ $Tag->id }}
                </td>
                <td class="d-flex">
                  <a href="{{ route('Tag.edit', [$Tag->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                  <form action="{{ route('Tag.destroy',[$Tag->id])}}" class="mr-1" method="POST">
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
                    <h5 class="text-center">No tags found.</h5>
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