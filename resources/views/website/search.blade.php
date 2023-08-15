@extends('layouts.website')
@section('content')

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <h2>Search Result</h2>
        </div>
      </div>

      @if($post->count())
      @php $count = 0; @endphp <!-- Biến đếm số lượng kết quả -->

      <div class="row">
      @foreach($post->sortByDesc('created_at') as $resultPost)
        @if($count == 0)
          <div class="row">
        @endif

        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src ="{{ asset($resultPost->image) }}" alt="Image" class="img-fluid rounded" style="max-width:100%; height:400px; overflow:hidden"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-danger mb-3">Sports</span>
            <span class="post-category text-white bg-warning mb-3">Lifestyle</span>

            <h2><a href="single.html">{{ $resultPost->title }}</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src ="{{ asset('website') }}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">
                {{ $resultPost->account->username }}</a></span>
              <span>&nbsp;-&nbsp; 
                {{ $resultPost->created_at }}</span>
            </div>
            
              <p>
                {{ Str::limit($resultPost->content, 200, '...') }}
              </p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>

        @php
          $count++;
          if ($count == 3) {
            $count = 0;
            echo '</div>'; // Kết thúc hàng hiện tại
          }
        @endphp
      @endforeach

      @if($count != 0)
        </div> <!-- Kết thúc hàng nếu còn dư kết quả -->
      @endif

      @else
          <h5 class="text-center">No posts found.</h5>
      @endif

    </div>
  </div>
</div>
@endsection
