 @include('admin.layouts.sidebar')
 <title>Table</title>
 <style type="text/css">
   body{
    background: #DCDCDC;
   }
 </style>
 <div class="pusher" style="margin-right:300px;">
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
 <table class="ui celled padded table" style="text-align:center" >
    <br>
    <h1 class="ui orange center aligned header" >Tài khoản khách hàng</h1>
  <thead>
    <tr><th class="single line">Tên tài khoản khách hàng</th>
    <th class="single line">Địa chỉ email</th>
  </tr></thead>
  <tbody>
    <tr >
      <td >
    {{$data1[0]->name}}
      </td>
      <td >
    {{$data1[0]->email}}
      </td>  
    </tr>
  </tbody>
</table>
<div style="height: 5px;background:#f2711c;"></div>

<table class="ui celled padded table" style="text-align:center;" >
    <br>
    <h1 class="ui center aligned header">Thông tin thẻ thanh toán</h1>
  <thead>
    <tr><th >Tên chủ thẻ</th>
       <th >Số tài khoản</th>
        <th >Số điện thoại</th>
         <th>Mã CVV</th>
  </tr></thead>
  <tbody>
    <tr >
      <td >
    {{$data1[0]->card_name}}
      </td> 
      <td >
    ÁDASD
      </td> 
       <td >
    {{$data1[0]->phone_number}}
      </td>

        <td >
   DSASDSA
      </td>   
    </tr>
  </tbody>
</table>

<div style="height: 5px;background:black;"></div>


<table class="ui celled padded table" style="text-align:center" >
    <br>
    <h1 class="ui blue center aligned header">Chi tiết đơn hàng</h1>
  <thead>
    <tr>
      <th class="single line">Mã sản phẩm</th>
      <th class="single line">Tên sản phẩm</th>
        <th class="single line">Tổng giá tiền</th>  
  </tr></thead>
  @foreach($data1 as $da)
  <tbody>
    <tr >
      <td >
    {{$da->product_id}}
      </td> 
      <td >
     {{$da->product_name}}
      </td> 
     <td>
       {{number_format(((int)$da->product_sales_quantity)*((int)$da->product_price))}}. đ
     </td>
    </tr>
  </tbody>
  @endforeach
</table>
<div style="height: 5px;background:#2185d0;"></div>


</div>
