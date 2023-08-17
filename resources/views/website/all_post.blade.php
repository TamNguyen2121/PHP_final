@extends('layouts.website')
@section('content')   
    
    
    {{-- <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Category</span>
            <h3>Sports</h3>
            <p>Category description here.. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam error eius quo, officiis non maxime quos reiciendis perferendis doloremque maiores!</p>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="site-section bg-white">
      <div class="container">
        <div class="row">
          @foreach($post as $posts)
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="{{ route('website.post',['id'=>$posts->id] ) }}"><img src="{{ $posts->image }}"  width="350" height="200"></a>
              <div >
                <span class="post-category text-white bg-warning">{{ $posts->location->name }}</span>
                <h2 class="text-limit"><a href="single.html">{{ $posts->title }}</a></h2>
                <div class="post-meta align-items-center text-left clearfix">
                  <figure class="author-figure mb-0 mr-3 float-left"> <img src ="{{ asset('admin/img/photos/'.$posts->account->image) }}" class="img-circle" style="width:35px; height:35px"; ></figure>
                  <span class="d-inline-block mt-1">By <a href="#">{{ $posts->account->username }}</a></span>
                  <span>&nbsp;-&nbsp;{{ $posts->created_at->format('M d, Y') }}</span>
                </div>
                {{-- <p>{!! Str::limit($post->content, 100) !!}</p> --}}
                <p><a href="{{ route('website.post',['id'=>$posts->id] ) }}">Read More</a></p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
{{--     
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="{{ asset('website')}}/images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-success mb-3">Nature</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="{{ asset('website')}}/images/img_3.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-warning mb-3">Travel</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>


          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="{{ asset('website')}}/images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-secondary mb-3">Politics</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="{{ asset('website')}}/images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-success mb-3">Nature</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="{{ asset('website')}}/images/img_4.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-danger mb-3">Sports</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>


          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="{{ asset('website')}}/images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-success mb-3">Nature</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="{{ asset('website')}}/images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-danger mb-3">Sports</span>
              <span class="post-category text-white bg-secondary mb-3">Tech</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="{{ asset('website')}}/images/img_4.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-danger mb-3">Sports</span>
              <span class="post-category text-white bg-warning mb-3">Lifestyle</span>

              <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div> --}}
        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            @php
              // dd($post);
            @endphp
            <div class="custom-pagination">
              @if($post->currentPage() > 1)
              <a href="{{ $post->previousPageUrl() }}"><</a>
              @endif
      
              @for($i = 1; $i <= $post->lastPage(); $i++)
                  <a href="{{ $post->url($i) }}">{{ $i }}</a>
              @endfor
      
              @if($post->currentPage() < $post->lastPage())
                <a  href="{{ $post->nextPageUrl() }}">></a>
              @endif
          </div>
           
          </div>
        </div>
      
    </div>
  </div>
  @endsection
    
    
