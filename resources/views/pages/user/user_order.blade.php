 @include('layouts.user.header')

<div class="ui container" style="width: 1200px;">
<div class="ui placeholder segment" style="margin-top:60px;background: #DCDCDC;">
  <div class="ui two column stackable grid">
    <div class="column" style="width:190px;">
  
<div class="ui vertical menu" >
  <a class="teal item">
    Inbox
    <div class="ui teal left pointing label">1</div>
  </a>
  <a class="item">
    Spam
    <div class="ui label">51</div>
  </a>
  <a class="item active">
    Updates
    <div class="ui label">1</div>
  </a>
  <div class="item">
    <div class="ui transparent icon input">
      <input type="text" placeholder="Search mail...">
      <i class="search icon"></i>
    </div>
  </div>
</div>
    </div>


    <div class="middle aligned column" style="width: 900px;margin-left: 100px;">
      <h1 style="text-align:center">Lịch sử mua hàng</h1>
<script type="text/javascript">
  document.getElementById('a1').className='active item';
</script>
@if($data)
  @foreach($data as $da)
<div class="ui items" style="background:white;border-radius: 20px ;">
  <br>
  <div class="item" >
    <div class="image" >
      <img style="height:110px;width: 80px;margin-left: 40px;margin-top:-8px;border: 1px solid black;box-shadow: 3px 3px 3px" src="{{asset('resources/img/'.$da->book_image)}}">
    </div>
    <div class="content">
      <a class="header" name="product_name"> {{$da->product_name}}</a>
      <div class="description" style="font-size:2.2ch">
       <p>Ngày mua : {{$da->date}}</p>
            <p name="price">Thành tiền : {{number_format(((int)$da->product_sales_quantity)*((int)$da->product_price))}} đ </p>
      </div>
    </div>
  </div>

  
    <br>
</div>
  @endforeach
@else
<div style="height:500px;background: white;">
  <h3 style="text-align:center;padding:200px">Chưa có đơn hàng </h3>
</div>
@endif




    </div>
  </div>
</div>



 <style type="text/css">
   body{
    background: #DCDCDC;
   }
 </style>
 <script type="text/javascript">
   document.getElementById('header').style.visibility='visible';
 </script>
 <div class="ui center aligned container" style="padding:30px;margin-top: 40px;">
    @if(\Session::has('success'))
<script >
    function thing(){
   $('body')
  .toast({
     class: 'success',
    message: ' {{\Session::get('success') }}',
  })
;
}
window.onload =thing;
  </script>
@endif

</div>

</div>



 @include('layouts.user.footer')