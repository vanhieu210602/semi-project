 @include('layouts.user.header')
  <br><br><br>

  <div id="bd" style="visibility: hidden;">

<div class="ui mini basic modal" id="test" > 
  <div class="image content">
    <div class="ui medium image" >
      <img  style="height:450px;width: 400px" src="{{asset('resources/img/'.$bookdetail->book_image)}}">
    </div>
  </div>
  <i style="color:white;font-size: 4.5ch;margin-right: -14px;" class="ui close icon"></i>
 
</div>

 <style type="text/css">
  #sach{
  background: #2B2C2D;
  filter: brightness(1.1);
}
   body{
  background:#2B2C2D;
  font-size: 2.3ch;
}
.ui.small.image:hover{
  transform: scale(1.02);
  box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2);
    transition: all 0.2s;
  }
  #relative:hover .ui.pointing.label {
   visibility: visible;
  }
  .ui.pointing.label{
    visibility:hidden;
  }
  #click{
    visibility: hidden;
  }
  #main:hover #click{
    visibility: visible;
  }
 </style>   

<script type="text/javascript">
  setTimeout(()=>{
$('#bd').transition('fade');
},300);
  
  document.getElementById("header").style.visibility= "visible";
    function active(){
        document.getElementById("sach").className = "active item";
    }
    window.onload=active;

    $('.header')
  .transition('pulse')
;
</script>

<div class="ui container" style="margin-top:10px">



<div class="ui two column very relaxed stackable grid" style="margin-top:-10px">
    <div class="column" style="width: 650px;">
  
 <h2 style="color:white;">{{$bookdetail->book_title}}</h2>
   <div class="csvideo">
  <video controls="controls"  autoplay controls  muted id="csvideoitem"  preload="yes" loop style="width: 100%;height: 100%;box-shadow: 0 10px 16px 0 rgba(0,0,0,1.8);border: 2px solid white; 
   ;">
  <source src="{{asset('resources/videos/'.$bookdetail->video)}}" type="video/mp4">
    
</video>
</div>



  <div class="description" style="margin-top:20px;"> 
<div class="ui list">
  <div class="item">
    <div class="header" style="color:white;">Mô tả Game</div><br>
    <h4 class="ui block header" style="font-weight:lighter;background: #1b1c1d  ;color: white;">{{ $bookdetail->book_descr}}</h4>
  </div><br>
</div> 
      </div>

<center>

<div class="ui inverted segment">
 <div class="ui inverted threaded comments" style=";padding:25px;border-radius: 10px;width: 100%;text-align: left;" >
  <h3 class="ui inverted dividing header" >Bình luận</h3>
  @foreach($comment as $com)
  @if($com->status == '1')
  <div class="comment">
    <a class="avatar">
      <img src="https://www.adweek.com/wp-content/themes/adweek-next/src/images/default-bio-photo.svg" >
    </a>
    <div class="content">
      <a class="author">{{$com->user_post_name}}</a>
      <div class="metadata">
      <span class="date" >{{$com->date}}</span>
      @php 
      $tr=$com->rating;
      @endphp
     @for($count=0;$count<$tr;$count++)
       <i class="star icon" style="color:orange;font-size: 1.3ch;"></i>
@endfor
<span >Đã được phê duyệt</span><i class="check circle icon" style="color:green;font-size:2ch"></i>
      </div>
      <div class="text">
        <p>{{$com->comment_content}}</p>
      </div>
    </div>
    @foreach($reply_comment as $key =>$com_reply)
    @if($com_reply->comment_id ==$com->comment_id)
     <div class="comments">
        <div class="comment">
          <a class="avatar" >
            <img src="https://us.123rf.com/450wm/pxlprostudio/pxlprostudio1901/pxlprostudio190106201/116646328-profile-icon-on-black-background-for-graphic-and-web-design-modern-simple-vector-sign-internet-conce.jpg?ver=6" style="border:2px solid white;">
          </a>
          <div class="content">
            <a class="author">GG Shop</a>
            <i class="check circle icon" style="color:green"></i>
            <div class="metadata">
      <span class="date" >{{$com_reply->date}}</span>
      </div>
            <div class="text">
              {{$com_reply->reply_comment_content}}
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
 </div>

@endif
   @endforeach


    <form class="ui reply form" action="{{URL::to('/dangbinhluan/'.$bookdetail->id)}}"  style="margin-top: 20px;" method="POST">
    @csrf
     @guest
      <div class="field">
      <textarea style="margin-top: 5px;"></textarea>
    </div>
    <a onclick="location.href='login';return alert('Bạn phải đăng nhập để tiếp tục');" class="ui labeled submit icon button" style="background:#004687;color:white">
      <i class="icon edit"></i> Bình luận
    </a>
     @else
       <div class="field" id="comm">

<style type="text/css">
  .rate-area {
  float: left;
  border-style: none;
}

.rate-area:not(:checked) > input {
  position: absolute;
  top: 0px;
  clip: rect(0,0,0,0);
}

.rate-area:not(:checked) > label {
  float: right;
  width: 1em;
  padding: 0 .1em;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 220%;
  line-height: 1.2;
  color: lightgrey;
  text-shadow: 1px 1px #bbb;
}

.rate-area:not(:checked) > label:before { content: '★ '; }

.rate-area > input:checked ~ label {
  color: orange;
  text-shadow: 1px 1px #c60;
  font-size: 220% !important;
}

.rate-area:not(:checked) > label:hover, .rate-area:not(:checked) > label:hover ~ label { color: orange; }

.rate-area > input:checked + label:hover, .rate-area > input:checked + label:hover ~ label, .rate-area > input:checked ~ label:hover, .rate-area > input:checked ~ label:hover ~ label, .rate-area > label:hover ~ input:checked ~ label {
  color: orange;
  text-shadow: 1px 1px goldenrod;
}

.rate-area > label:active {
  position: relative;
  top: 1px;
  left: 1px;
}
</style>
       <span class="rate-area" >
          <a class="ui image label" style="background:linear-gradient(to right, rgb(201, 75, 75), rgb(75, 19, 79));color: white;border-radius: 20px;">
  <img src="https://www.adweek.com/wp-content/themes/adweek-next/src/images/default-bio-photo.svg" style="border-radius:20px;">
  {{ Auth::user()->name}}
</a>
         <br>
  <input  type="radio" id="5-star" name="rating" value="5" /><label for="5-star" title="Amazing">5 stars</label>
  <input type="radio" id="4-star" name="rating" value="4" /><label for="4-star" title="Good">4 stars</label>
  <input type="radio" id="3-star" name="rating" value="3" /><label for="3-star" title="Average">3 stars</label>
  <input type="radio" id="2-star" name="rating" value="2" /><label for="2-star" title="Not Good">2 stars</label>
  <input required type="radio" id="1-star" name="rating" value="1" /><label for="1-star" title="Bad">1 star</label>
</span><br>
      <textarea style="margin-top: 5px;" name="comment_content" required ></textarea>
    </div>
      <button type="submit" class="ui labeled submit icon button" style="color:black;">
      <i class="icon edit"></i> Bình luận
    </button>
          @endguest
  </form>


</div>
</div>

</center>
    </div>
    <div class=" column" style="width:500px;margin-top: 60px;padding: 0;" >
    
<div class="ui divided items">
 
  <div class="item">
  
    <div id="main" class="ui image"  onclick="bigImg()" data-tooltip="Click để phóng to ảnh " data-inverted="" >
      <img style="width: 200px;height: 330px;" src="{{asset('resources/img/'.$bookdetail->book_image)}}"  >   
    </div>
    <div class="content">
      <div class="meta">
        <p style="color:white;">Nhà phát hành : {{$bookdetail->book_author}}</p>
         <div class="ui label" style="color:black">Phiên bản giới hạn </div>
          <div class="extra">
        <div class="ui center floated " >
          <form method="POST" action="{{ URL::to('/save_cart')}}">
            @csrf
             <h3 class="ui block white header" style="text-align:center;color:black;"> {{ number_format($bookdetail->book_price).'đ'}} </h3>
            <input type="hidden" name="productid_hidden" value="{{$bookdetail->id}}">
            <input type="hidden" name="qty" value="1">
               <?php 
            $content=Cart::content(); 
            ?>
      
     <div class="ui massive inverted yellow rating" data-icon="star" data-rating="3" data-max-rating="7"></div>     
 <button id="add_to_cart_button" style="background: linear-gradient(to right, rgb(201, 75, 75), rgb(75, 19, 79));color:white;width: 100%;border: 1px solid black;" name="cart" class="ui large button" type="submit">Thêm vào giỏ hàng <i class="right chevron icon"></i></button>
  
            
             @foreach($content as $v_content)
              @if($v_content->id == $bookdetail->id)
              <a href="{{url('/giohang')}}" style="width:100%" class="ui black large button">Đã thêm vào giỏ hàng</a>
              <script type="text/javascript">
                document.getElementById('add_to_cart_button').style.display='none';
              </script>         
              @endif
              
            @endforeach
           

          </form>
        </div>
      
      </div>
      </div>
      <br><br>
       <script type="text/javascript">
      function bigImg() {
  $('#test')
  .modal('show')
;
}
function normalImg() {
  $('#test')
  .modal('hide')
;
}

    </script>
    </div>
  </div>
</div>


 <div class="ui center aligned container" style="background: white;padding:5px;border-radius:0px;margin-top: 64px;overflow-y: auto;
    height: 425px;
    overflow-x: hidden;border-radius: 10px;" >
      <h3 class="ui center aligned header" style="margin-top:10px">Các game liên quan khác</h3>  
      

<div class="ui two special cards" style="margin-left: 30px;">
  @foreach($relative_books as $book)
  <div class="card" style="width: 180px">
    <div class="blurring dimmable image">
      <div class="ui dimmer">
        <div class="content">
          <div class="center">
            <a href="{{ url('chitietgame.'.$book->id)}}" class="ui inverted button">Xem chi tiết</a>
          </div>
        </div>
      </div>
      <img style="height:250px;width: 180px" src="{{asset('resources/img/'.$book->book_image)}}">
    </div>
  </div>
     @endforeach
</div>
<script type="text/javascript">
  $('.special.cards .image').dimmer({
  on: 'hover'
});
</script>


   
    <br><br>
      </div>



    </div>
  </div>

</div>

</div>

</div>



<style type="text/css">
 
.ui.card{
    box-shadow: 0px 0px 0px;
}
 
.ui.card:hover .ui.popup{
    display: block;
   -webkit-animation: fadeIn 0.4s;
}

</style>



@if(\Session::has('suss'))
<div class="ui mini modal" id="mode">
  <div class="ui center aligned icon header"><i class="cart plus icon" style="color:#004687" ></i>
  {{\Session::get('suss') }} </i></div>
</div>
<script >
    function thing(){
 setTimeout(() => {
             $('#mode')
  .modal('hide')
              }, 1500);

      $('.ui.modal')
      .modal({
     inverted: true
  })
  .modal('show')
;
}
window.onload =thing;
  </script>
@endif

@if(\Session::has('success'))

<script >
 document.getElementById("comm").scrollIntoView();
  </script>
@endif

 @include('layouts.user.footer')
