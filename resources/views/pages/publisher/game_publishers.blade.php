  @include('layouts.user.header')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js" integrity="sha512-Gfrxsz93rxFuB7KSYlln3wFqBaXUc1jtt3dGCp+2jTb563qYvnUBM/GP2ZUtRC27STN/zUamFtVFAIsRFoT6/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" integrity="sha512-+1GzNJIJQ0SwHimHEEDQ0jbyQuglxEdmQmKsu8KI7QkMPAnyDrL9TAnVyLPEttcTxlnLVzaQgxv2FpLCLtli0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <br><br>




     <h1 id="h1" class="ui center aligned header" style="text-align:center;color:white;font-size: 4ch;">Nhà phát hành game</h1>
     <style type="text/css">
      #nhaxuatban{
  background: #2B2C2D;
  filter: brightness(1.1);
}
    body{
       background:#2B2C2D;
    }

#card{
  height: 385px;
  width: 415px;
  background: black;
  margin-left: 30px;
   box-shadow: 0 10px 16px 0 rgba(0,0,0,1.8);
   overflow: hidden;
     background: #222;
}

#card .caption{
  z-index: 1;
  transform: translateY(-180px);
  color: white;
  font-size: 7ch;
  font-weight: bold;
  text-align: center;
 transition: transform 1s;
  line-height: 60px;
  margin-right: 0px;
}
#card #publisherimg{
  height: 400px;
  width: 415px;
   transition: 0.6s;
   filter: brightness(70%) ;
}

#card:hover .caption{
  transform: translateY(-390px);
  transition: 0.6s;
}

#card #all{
  margin-left: 80px;
  transition: transform 1s;
    margin-top: -20px;
    overflow-y: auto;
    height: 240px;
    overflow-x: hidden;
}
#card:hover #all{
   transform: translateY(-360px);
}

#game{
  margin-top: 20px;
  overflow: hidden;
  height: 140px;
  width: 100px;
  border: solid 1px transparent;
  margin-left: 20px;
transition: 0.3s;
}
#game:hover{
  border: solid 1px white;
}
#game img{
  height: 140px;
  width: 100px;
}
  </style>
  <script type="text/javascript">
     document.getElementById('nhaxuatban').className = 'active item';
</script>
<br>


<ul id="autoWidth" >
  @foreach($publisher as $publisher)
     <div id="card" onclick="showgame()" >
       <img style="object-fit: cover;" id="publisherimg" src="{{asset('resources/img/'.$publisher->image)}}" >
       <div class="caption">
         {{$publisher->publisher_name}}
       </div>
       <div id="all" >
  
<div class="ui inverted two stackable cards" >
  @foreach($game as $g)
  @if($publisher->publisherid == $g->publisherid)
  <div class="card " id="game" >
    <div class="image">
      <img src="{{asset('resources/img/'.$g->book_image)}}">
    </div>
  </div>

  @endif
  @endforeach
</div>
</div>
     </div>
  @endforeach

</ul>

  @include('layouts.user.footer')


  <script type="text/javascript">
  $(document).ready(function() {
    $("#autoWidth").lightSlider({
      autoWidth:true,
      loop:true,
    }); 
  });
</script>


