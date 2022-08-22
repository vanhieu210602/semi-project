 @include('layouts.user.header')
   <br><br><br>

<body >
   <h1 class="ui center aligned header" id="h1" style="color:white;font-size: 5ch;transition: 0.5s;font-size: 4ch;margin-left: 200px;">Tất cả game</h1>

 <!--?php if(isset($_GET['country_name'])){
        echo "<h2 style='color:white;margin-left: 200px;' class='ui center aligned header'>Kết quả cho từ khóa ' ".$_GET['country_name']." '</h2>";}
        else {
            echo 'haha';
        }
     ?-->

<?php
if(count($games)==0 && isset($_GET['country_name'])){
    echo "<h2 style='color:white;margin-left: 200px;' class='ui center aligned header'>Không có kết quả cho từ khóa ' ".$_GET['country_name']."... '</h2>";
    echo '
    <div style="height:350px" ></div>';
}
else if(count($games)==0){
    echo "  <h1 class='ui center aligned header' style='color:white;display: none;margin-left: 200px;'' id='no'>Không có kết quả !</h1>";
  } 
else if(count($games) >0  && isset($_GET['country_name'])){}

?>




<div class="ui middle aligned stackable grid container" style="margin-top:10px;">
    <div class="one wide column" style="left: 30px;position: absolute;top:80px">
     
 @include('pages.game.menu')

    </div>


    <div class="thirteen wide right floated column" style="margin-right: -40px;">   

<div class="ui inverted four stackable cards">
     @foreach($games as $book)
  <div id="card" class="card" style="width: 190px;visibility: hidden;">

<style type="text/css">
  .card {
    width: 190px;
    height: 280px;
}
.card video {
  width: 100%;
  height: 100%;
  position: absolute;
  object-fit: cover;
  z-index: 0;
  visibility: hidden;
  transition: all 0.4s ;
}
.card:hover video{
    border: 1px solid white;
    transform: translate(-70px, 0px) scale(1.05);
    width: 320px;
    height: 273px;
    transition-delay: 0.4s;
    visibility: visible;
    z-index: 1;
       box-shadow: 0 10px 16px 0 rgba(0,0,0,0.8);
       filter: brightness(80%);
}
.card:hover{
    transform: scale(1.15);
    z-index: 1;
}


#card{
     transition: all 1s ;
}

.card:hover img{
    opacity: 0;
    transition: opacity 0.5s;
}

#infoi {
    z-index: 1;
  width: 100%;
  height: 100%;
  position: absolute;
  text-align: center;
  top: 200px;
visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.5s linear;
  
}
.card:hover #infoi{
    display: block;
     visibility: visible;
     top: 80px;
  opacity: 1;
  transition: 0.3s;
  transition-delay: 0.6s;

}

</style>


    <div class="image" >
         <video muted loop >
        <source src="{{asset('resources/videos/'.$book->video)}}" type="video/mp4" />
        
    </video>
    <div id="infoi">
     <h2 style="color:white;font-weight:bold;">{{$book->book_title}}</h2>   
    <a href="{{ url('chitietgame.'.$book->id)}}" class="ui button" style="background: white">Xem chi tiết</a>
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

      <img style="height:280px;width: 190px" src="{{asset('resources/img/'.$book->book_image)}}">
    </div>



  </div>
  @endforeach
</div>


    </div>
  </div>







<style type="text/css">
 #sach{
  background: #1B1C1D;
  filter: brightness(1.1);
}
body{
   background:#1B1C1D;
}

</style>

</body>


<?php
if(count($games)>0 ){
    echo  "<script> 
  document.getElementById('1').className='active item';
 document.getElementById('sach').className = 'active item';

      setTimeout(() => {
                $('.card').transition({
    animation : 'fade',
    reverse   : 'auto', // default setting
    interval  : 100
  });
}, 300);
  
</script>"; }

?>

<div style="height:200px"></div>
  

@include('layouts.user.footer')

