@extends('layouts.website')
@section('content')    
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset('website') }}/images/img_5.jpg');">
        <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
                <h1 class="">Welcome TravelExplorer</h1>
                <p class="lead mb-4 text-white">
                TravelExplorer ra đời năm 2023. Với sứ mệnh chia sẻ kinh nghiệm du lịch cho cộng đồng du lịch Việt Nam, chuyên sâu là những 
                kinh nghiệm thực tế, review thật, trải nghiệm thật. Mục đích giúp mọi người đều có thể đi du lịch tự túc một cách dễ dàng. 
                TravelExplorer muốn khẳng định lại những giá trị chân thực của du lịch, đó là: <br> TỰ DO TRẢI NGHIỆM THEO CÁCH CỦA CHÍNH MÌNH.
                </p>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <h2><center>SỨ MỆNH TravelExplorer</center></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src ="{{ asset('website') }}/images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">

            <h2><a href="single.html">CHIA SẺ KINH NGHIỆM DU LỊCH</a></h2>
            
              <p>{{ Str::limit (
              "Cuộc sống là cho đi, với niềm đam mê du lịch của mình, TravelExplorer không có gì ngoài những Kinh Nghiệm chuyến đi. Tất cả đều được
              TravelExplorer chia sẻ hết trong các bài viết. Đây đều là những trải nghiệm thật đã được các thành viên trong team, cũng như cộng 
               đồng cộng tác viên chia sẻ. Bạn cũng đừng ngại ngần chia sẻ những điều thú vị trong chuyến đi của mình với cộng đồng nhé, 
               hãy liên hệ TravelExplorer để chúng ta cùng giúp mọi người có những chuyến đi đầy Ý Nghĩa, giàu trải nghiệm." , 250, '...') }}
              </p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src ="{{ asset('website') }}/images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">

            <h2><a href="single.html">TẠO NÊN CHUYẾN ĐI GIÀU TRẢI NGHIỆM</a></h2>
              <p> {{ Str::limit(
              "Du lịch phải thật, trải nghiệm phải thật. Với TravelExplorer du lịch phải đi sâu vào cuộc sống địa phương. Trải nghiệm sự bình dị 
              thân thuộc, mỗi bước chân mình đến phải Cảm nhận được điều gì đó. Khám phá ra chính bản thân mình sau mỗi chuyến đi. Những 
              chuyến đi đó cũng phải thực sự linh hoạt & tự do theo cách của chính bạn. Với kinh nghiệm của mình, Toidi tự tin dẫn bạn đến 
              với những chuyến đi thực sự: Tự do, Trải nghiệm, và Ý nghĩa." , 250, '...') }}
              </p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src ="{{ asset('website') }}/images/img_3.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">

            <h2><a href="single.html">TRUYỀN THÔNG ĐIỆP</a></h2>
              <p>{{ Str::limit (
              "Truyền tải những bài viết chứa đựng thông tin bổ ích, chất lượng, chính xác, TravelExplorer sẽ đưa đến một cái nhìn toàn diện nhất 
              cả về nội dung và hình ảnh cho bạn đọc. Những chủ đề được cập nhật trên website được chia thành các mảng và loại hình khác 
              nhau cực kỳ tiện lợi trong việc hướng đến đúng đối tượng và nhu cầu của khách hàng. Từ đó mà giúp họ có cái nhìn tổng quát, 
              tiết kiệm thời gian và tạo nên một lịch trình cụ thể cho chuyến đi của mình." , 250, '...') }}
              </p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection