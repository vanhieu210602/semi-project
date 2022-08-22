 @include('layouts.user.header')
   <br><br><br>

<body >

<style type="text/css">
    #contain{
        margin-top: -20px;
        background: url('resources/img/banner1.png');
        background-repeat: no-repeat;
        background-position: center center;
        -webkit-background-size: cover;
        background-size: cover;
        width: 100%;
        height: 40vh;
        display: flex;
        flex-flow: column;
        justify-content: center;
        color: white;
    }

</style>


    <div id="contain" >
          <h1 style="margin-left:80px;font-size: 8ch;">Tất cả game</h1>  
    </div>
 


<div id="slideshow" class="ui middle aligned stackable grid container" style="margin-top:20px;position: relative;">
    <div class="one wide column" style="position: absolute;top:10px">
     
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
  

   <?php
if(count($games)==0 && isset($_GET['country_name'])){
    echo "<h2 style='color:white;' class='ui center aligned header'>Không có kết quả cho từ khóa ' ".$_GET['country_name']."... '</h2>";
    echo '
    <div style="height:350px" ></div>';
}
else if(count($games)==0){
    echo "  <h1 class='ui center aligned header' style='color:white;display: none;margin-left: 200px;'' id='no'>Không có kết quả !</h1>";
  } 
else if(count($games) >0  && isset($_GET['country_name'])){
     echo "<h2 style='color:white;' class='ui center aligned header'>Kết quả cho từ khóa ' ".$_GET['country_name']."... '</h2>";
}

?>

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
        <div class="meta">
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
    </div>
        <div class="description">
         <span style="font-size:2ch">{{number_format($book->book_price)}} đ</span>

@foreach($buycount as $cb)
 @if($book->id == $cb->product_id)
         <span style="margin-left: 5px;">
          Đã bán: {{$cb->count}}
      </span>
      @endif
      @endforeach
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
      document.getElementById('1').className='active item';
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