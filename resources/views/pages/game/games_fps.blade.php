 @include('layouts.user.header')
   <br><br><br>

<body >
 
<?php
if(count($games)==0){
    echo "  <h1 class='ui center aligned header' style='color:white;display: none;margin-left: 200px;'' id='no'>Không có kết quả !</h1>";
  } 
?>

<div id="slideshow" class="ui middle aligned stackable grid container" style="margin-top:10px;">
    <div class="one wide column" style="left: 20px;position: absolute;top:100px">
     
 @include('pages.game.menu')

 @if(count($games)>8)
 @include('pages.game.bannerleft')
 @endif
    </div>
<style type="text/css">
    .card{
        width: 300px;
    }
    .card video {
  width: 100%;
  position: absolute;
  object-fit: cover;
  z-index: 0;
  top: 0;
  height: 260px;
  opacity: 0;
  transition: all 0.4s;
}
.card:hover video{
    z-index: 1;
     opacity: 1;
     transition-delay: 1s;
    transition: all 0.4s ;
}
 #sach{
  background: #2B2C2D;
  filter: brightness(1.1);
}
body{
   background:#2B2C2D;
}
</style>

    <div class="thirteen wide right floated column" style="margin-right: -20px;">
   <h2 class="ui center aligned header" style="color:white;font-size: 3.5ch;">Game bắn súng fps</h2>      
<div class="ui inverted segment" style="background:#2B2C2D">
  <div class="ui link four inverted cards" >
    @foreach($games as $book)
    <div class="card" id="card" style="width: 200px;">

      <div class="image">
        <img style="height: 260px" src="{{asset('resources/img/'.$book->book_image)}}">
        <video muted loop >
        <source src="{{asset('resources/videos/'.$book->video)}}" type="video/mp4" />
    </video>
      </div>
      <div class="content" style="text-align: center;">
        <p class="header">{{$book->book_title}}</p>
        <div class="description">
         {{number_format($book->book_price)}} đ
        </div>
      </div>
      <div class="extra content">
        <center>
           <a href="{{ url('chitietgame.'.$book->id)}}" class="ui inverted button">Xem chi tiết</a>
        </center>
         
      </div>
    </div>
    @endforeach
   
  </div>
</div>

    </div>
  </div>

</body>


<div style="height:200px"></div>
  



 <script>
      document.getElementById('2').className='active item';
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


@include('layouts.user.footer')