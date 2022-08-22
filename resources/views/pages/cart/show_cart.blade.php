  @include('layouts.user.header')
  <br><br><br>
      <h1 class="ui center aligned header" style="font-size:5ch;color:white ;">Giỏ hàng</h1>
  <script type="text/javascript">
     document.getElementById('header').style.top='0px';
document.getElementById("giohang").className = "active item";
</script>
<?php
$content=Cart::content();
?>

<style type="text/css">
#giohang{
  background: #2B2C2D;
  filter: brightness(1.1);
}
  body{
    font-family: Helvetica ;
    font-size: 2.2ch;
    background: #2B2C2D;
  }
</style>
    <div class="ui center aligned container" style="margin-top:40px" >
    

<div style='display: none;' id='empty'>
    <h2 class='ui center aligned header' style="color:white;">Giỏ hàng rỗng ! Hãy thêm sản phẩm vào giỏ hàng để tiếp tục thanh toán !</h2>
</div>

  <div id="show_cart" class="ui two column very relaxed stackable grid" style="box-shadow: 0 10px 16px 0 rgba(0,0,0,1.8);">
    <div class="column" style="background:#1B1C1D;display: none;" id="form1">
       <h3 class="ui header" style="background:white;color:black;text-align:left;padding: 10px;border-radius: 20px;" > Sản phẩm</h3>
       <a  href="{{url('/xoatatca_giohang')}}" class="ui red right labeled icon button">Xoá tất cả<i class="trash alternate outline icon"></i></a>
      <div class="ui divided items">
          @foreach($content as $v_content)

  <div class="item">
    <div class="image" >
      <img style="height:200px;width: 140px;border:2px solid white;" src="{{asset('resources/img/'.$v_content->options->image)}}">
    </div>
    <div class="content" style="background:white;padding: 10px;">
      <h2 class="header" style="color:black;">{{$v_content->name}}</h2>
      <div class="description" style="color:black;">
        <h3>Tổng : <?php
$subtotal = $v_content->price * $v_content->qty;
echo number_format($subtotal);
         ?> đ</h3>
      </div><br>  
      <div class="extra"> 

  <form action="{{URL::to('/delete_to_cart'.$v_content->rowId)}}" method="POST">   
  @csrf       
<button type="submit" name="" class="ui red button" >Xóa</button>
</form>
       
      </div>
    </div>
  </div>
    @endforeach
</div>

    </div>
    <div class="column" style="background:white;display: none;"  id="form2">

     <h1  class="ui center aligned header" style="background:#1B1C1D;color: white;padding: 10px;height: 60px;border-radius: 35px;margin-top: 50px;">Thành tiền</h1>
     <h1 style="font-size:3.5ch;"><a id="total" style="color:black" >{{(Cart::subtotal())}} đ  </a></h1>

  <div class="ui large buttons">
  <a href="{{ url('/khosach') }}"><button class="ui button" style="background:#DCDCDC;" id="demo" >Tiếp tục mua sắm</button></a>
  <div class="or" data-text=""></div>
  <a href="{{URL::to('/checkout')}}"><button class="ui black button">Tiến hành thanh toán</button></a>
</div> 

    </div>
  </div>
    
 </div>
<?php
if(count($content)==0){
  echo '<script>

  setTimeout(() => {
                 $("#empty").transition("scale");
               }, 300);             
 </script>';
}
else if(count($content)>0){
  echo '<script>
document.getElementById("empty").display="none";
  setTimeout(() => {
                 $("#form1").transition("fade up");
                 $("#form2").transition("fade down");
               }, 200);             
 </script>';
}
?>
<script type="text/javascript">
function xoa(){
  $('#xoa')
  .modal('setting', 'closable', false)
  .modal('show');

}

</script>

<div style="height:400px"></div>
  <script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  
<script type="text/javascript">
  const swup = new Swup(); 
</script>
<style type="text/css">
  .transition-fade{
    opacity: 1;
    transition: 500ms;
    transform: translateY(0);
    transform-origin: top;
  }
  html.is-animating .transition-fade{
    opacity: 1;
    transform: translateX(100%);
    transform-origin: left;
  }
  html.is-leaving .transition-fade{
    opacity: 0;
  }
</style>


 @include('layouts.user.footer')