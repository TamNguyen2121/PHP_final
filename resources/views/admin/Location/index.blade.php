@extends('layouts.admin')
@section('content')
<div class="content-header">

    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Locations</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item active">Locations list</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- SEARCH FORM -->
<form class="form-inline ml-3" action="" method="GET">
<div class="input-group input-group-sm">
  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="locationKey">
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
                    <h3 class="card-title">Location List</h3>
                    <a href="{{ route('location.create') }}" class="btn btn-primary">Create Location</a>
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
                  @if($locations->count())
                @foreach($locations as $location)
                <tr>
                <td>{{ $location->id }}</td>
                <td>{{ $location->name }}</td>
                <td>{{ $location->Address }}</td>
                <td>
                  {{ $location->count }}
                </td>
                <td class="d-flex">
                  <a href="{{ route('location.edit', [$location->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                  <form action="{{ route('location.destroy',[$location->id])}}" class="mr-1" method="POST">
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
                    <h5 class="text-center">No Locations found.</h5>
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
   <div class="card-footer">
    <div class="row text-center pt-5 border-top">
      <div class="col-md-12">
        <ul class="pagination pagination-sm m-0 float-right">
        
          @if($locations->currentPage() > 1)
          <li class="page-item"><a class="page-link"  href="{{ $locations->previousPageUrl() }}"><</a></li>
          @endif
  
          @for($i = 1; $i <= $locations->lastPage(); $i++)
          <li class="page-item"><a class="page-link"  href="{{ $locations->url($i) }}">{{ $i }}</a></li>
          @endfor
  
          @if($locations->currentPage() < $locations->lastPage())
          <li class="page-item"><a class="page-link"   href="{{ $locations->nextPageUrl() }}">></a></li>
          @endif
        </ul>
       
      </div>
    </div>
   </div>

@endsection