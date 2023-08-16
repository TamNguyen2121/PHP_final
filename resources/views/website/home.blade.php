@extends('layouts.website')
@section('content')
<div class="site-section bg-light">
    <div class="container">
      <div class="row align-items-stretch retro-layout-2">
        <div class="col-md-4">
          @foreach($FirstPost as $post)
          <a href="{{ route('website.post',['id'=>$post->id])  }}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ $post->image }}');">
            
            <div class="text">
              <h2 class="text-limit">{{ $post->title }}</h2>
              <span class="date">{{ $post->created_at->format('M d,Y') }}</span>
            </div>
          </a>
          @endforeach
        </div>
      
        <div class="col-md-4">
          @foreach ($MiddlePost as $post )
            
        
          <a href="{{ route('website.post',['id'=>$post->id] ) }}" class="h-entry img-5 h-100 gradient" style="background-image: url('{{ $post->image }}');">
            
            <div class="text">
              <h2 class="text-limit">{{ $post->title }}</h2>
              <span class="date">{{ $post->created_at->format('M d,Y') }}</span>
            </div>
          </a>
      @endforeach
        </div>
        <div class="col-md-4">

          @foreach($LastPost as $post)
          <a href="{{ route('website.post',['id'=>$post->id]) }}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ $post->image }}');">
            
            <div class="text">
              <h2 class="text-limit">{{ $post->title }}</h2>
              <span class="date">{{ $post->created_at->format('M d,Y') }}</span>
            </div>
          </a>
          @endforeach
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <h2>Recent Posts</h2>
        </div>
      </div>
      <div class="row">
        @foreach($recentPosts  as $post )
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="{{ route('website.post',['id'=>$post->id] ) }}"><img src ="{{ $post->image }}" alt="Image"  width="350" height="200"></a>
            <div>
            <span class="post-category text-white bg-secondary mb-3 bg-danger ">{{ $post->location->name }}</span>

            <h2 class="text-limit" ><a href="single.html">{{ $post->title }}</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src ="{{ asset('admin/img/photos/'.$post->account->image) }}" class="img-circle" style="width:35px; height:35px"; ></figure>
              <span class="d-inline-block mt-1">By <a href="#">{{ $post->account->username }}</a></span>
              <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d, Y') }}</span>
            </div>
            
            {{-- <p> {{ Str::limit($post->content, 100) }} </p> --}}
              <p><a href="{{ route('website.post',['id'=>$post->id] ) }}">Read More</a></p>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
      <div class="row text-center pt-5 border-top">
        <div class="col-md-12">
          <div class="custom-pagination">
            @if($recentPosts->currentPage() > 1)
            <a href="{{ $recentPosts->previousPageUrl() }}"><</a>
            @endif
    
            @for($i = 1; $i <= $recentPosts->lastPage(); $i++)
                <a href="{{ $recentPosts->url($i) }}">{{ $i }}</a>
            @endfor
    
            @if($recentPosts->currentPage() < $recentPosts->lastPage())
              <a  href="{{ $recentPosts->nextPageUrl() }}">></a>
            @endif
        </div>
         
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light">
    <div class="container">

      <div class="row align-items-stretch retro-layout">
        @foreach ($firstFooterPost as $post)

        <div class="col-md-5 order-md-2">
          <a href="{{ route('website.post',['id'=>$post->id] ) }}" class="hentry img-1 h-100 gradient" style="background-image: url('{{ $post->image }}');">
            <span class="post-category text-white bg-danger">{{ $post->location->name}}</span>
            <div class="text">
              <h2 class="text-limit">{{ $post->title }}</h2>
              <span>{{ $post->created_at->format('M d,Y') }}</span>
            </div>
          </a>
       
        </div>
        @endforeach

        <div class="col-md-7">
          @foreach ($middleFooterPost as $post)
          <a href="{{ route('website.post',['id'=>$post->id] ) }}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{ $post->image }}');">
            <span class="post-category text-white bg-success">{{ $post->location->name }}</span>
            <div class="text text-sm">
              <h2 class="text-limit">{{ $post->title }}</h2>
              <span>{{ $post->created_at->format('M d,Y') }}</span>
            </div>
          </a>
          @endforeach

          <div class="two-col d-block d-md-flex">
            @foreach ($lastFooterPost as $post)
            <a href="{{ route('website.post',['id'=>$post->id] ) }}"  class="hentry v-height img-2 gradient" style="background-image: url('{{ $post->image }}');">
              <span class="post-category text-white bg-primary">{{ $post->location->name }}</span>
              <div class="text text-sm">
                <h2 class="text-limit">{{ $post->title }}</h2>
                <span>{{ $post->created_at->format('M d,Y') }}</span>
              </div>
            </a>
            @endforeach
            @foreach ($endFooterPost as $post)
            <a href="{{ route('website.post',['id'=>$post->id] ) }}" class="hentry v-height img-2 ml-auto gradient" style="background-image: url('{{ $post->image }}');">
              <span class="post-category text-white bg-warning">{{ $post->location->name }}</span>
              <div class="text text-sm">
                <h2 class="text-limit">{{ $post->title }}</h2>
                <span>{{ $post->created_at->format('M d,Y') }}</span>
              </div>
            </a>
            @endforeach
          </div>  
          
        </div>
      </div>

    </div>
  </div>



@endsection
