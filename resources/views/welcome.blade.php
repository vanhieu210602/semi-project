 @include('layouts.user.header')
   <br><br><br><br>
<body >
<link rel="stylesheet" type="text/css" href="{{asset('resources/css/style.css')}}">
<style type="text/css">
#trangchu{
  background: #2B2C2D;
  filter: brightness(1.1);
}
 
</style>


  <div class="video-container">
   <img src="https://www.androidcentral.com/sites/androidcentral.com/files/styles/larger/public/article_images/2019/12/horizon-zero-dawn-aloy-and-machine.jpg?itok=qv4s3hco">
    <div class="caption">
     <div class="ui center aligned text container" style="margin-top:100px;" >

  <h1 id="h1"  style="font-size: 9ch;color: whitesmoke;">
      GG Shop</h1>
       <h2 id="h2" style="color:whitesmoke;font-size: 3ch;">Thiên đường game thủ </h2>

</div>
    </div>
</div>

<br><br>
  <h2 id="allgame" class="ui center aligned header" style="color:white;font-size: 3.5ch;">Game mới nhất</h2>
<div class="ui center aligned container" style="width: 1130px;margin-top: -50px;">
<div class="ui three column grid" >
    @foreach($books as $book)
  <div class="column" style="margin-top:50px">
    <div id="card" class="ui inverted fluid card" style="height: 420px;width: 350px;border-radius: 0;">
      <div class="image" >
        <img style="border-radius: 0;height:420px" src="{{asset('resources/img/'.$book->book_image)}}">
        
<video muted loop >
        <source src="{{asset('resources/videos/'.$book->video)}}" type="video/mp4" />
    </video>
         <div id="infoi" >
     <h2  style="color:white;font-weight:bold;">{{$book->book_title}}</h2>
     @foreach($rating as $ra)
     @if($book->id == $ra->book_id && $ra->status ==1)
          @php 
      $tr=$ra->rate;
      @endphp
     @for($count=0;$count<$tr;$count++)
       <i class="star icon" style="color:orange;font-size: 1.2ch;"></i>
@endfor
         @endif
         @endforeach
     <h3 style="color:white;font-weight:bold;margin-top: -3px">{{number_format($book->book_price)}} đ

 @foreach($buycount as $cb)
 @if($book->id == $cb->product_id)
         <span style="margin-left: 5px;">
          Đã bán: {{$cb->count}}
      </span>
      @endif
      @endforeach 
      
     </h3> 
    <a href="{{ url('chitietgame.'.$book->id)}}" class="ui large black button">Xem chi tiết</a>
  </div>

<script>
$(document).ready(function() {
     var movehover = $(".card").hover( hoverVideo, hideVideo );
     function hoverVideo(e) {
          $('video', this).get(0).play(1000);
     }
     function hideVideo(e) {
         $('video', this).get(0).pause();
     }
});
</script>

      </div>
    </div>
  </div>
  @endforeach
 
</div>
</div>
<div id="banner1" >
<img id="banner1-img1" src="https://i.ytimg.com/vi/2lBUfqNDeJQ/maxresdefault.jpg" >
<img id="banner1-img2" src="{{asset('resources/img/hitmanbanner.png')}}" >
</div>
<div class="ui container" style="width: 940px;margin-top: 60px;"> 
  <h1 class="ui center aligned header" style="color:white;">Các game bán chạy nhất</h1>
  <br>
<div class="ui six doubling cards" >
     @foreach($games as $book)
  <div id="card2" class="card">

    <div class="image" style="background:black">
         <video muted loop >
        <source src="{{asset('resources/videos/'.$book->video)}}" type="video/mp4" />
        
    </video>
    <div id="infoi2">
     <h2 style="color:white;font-weight:bold;">{{$book->book_title}}</h2>   
    <a href="{{ url('chitietgame.'.$book->id)}}" class="ui button" style="background: white">Xem chi tiết</a>
  </div>

  <script>
$(document).ready(function() {
     var movehover = $("#card2").hover( hoverVideo, hideVideo );
     function hoverVideo(e) {
          $('video', this).get(0).play(1000);
     }
     function hideVideo(e) {
         $('video', this).get(0).pause();
     }
});
</script>

      <img style="height:200px;object-fit: cover;" src="{{asset('resources/img/'.$book->book_image)}}">
    </div>
  </div>
  @endforeach
</div>
</div>
@include('pages.game.welcome_banner3')
        </body>
<script type="text/javascript">
  document.getElementById('all').className='active item';
</script>
@include('layouts.user.footer')