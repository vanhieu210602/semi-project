 @include('admin.layouts.sidebar')
 <title>Table</title>
 <style type="text/css">
      body{
        background: #DCDCDC;
      }
    </style>
 <div class="pusher" style="margin-right: 400px">
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
  
  
 <table class="ui celled padded table" style="text-align:center;" >
    <br>
    <h1 class="ui center aligned header" >Lịch sử đơn hàng</h1>
  <thead>
    <tr><th class="single line">Mã đơn hàng</th>
    <th class="single line">Tên người mua</th>
    <th>Tổng tiền(VNĐ)</th>
   <th>Ngày mua</th>
     <th>Xem chi tiết</th>
     <!--th>Xóa</th-->
    
  </tr></thead>
  <tbody>
    @foreach($allbooks as $book)
    <tr >
       <td >
     <a >{{$book->payment_id}}</a>
      </td>
      <td >
     <h4 name="publisherid">{{$book->buy_name}}</h4>
      </td>
      <td >
     <h4 class="ui center aligned header">{{$book->paypal_total}}.đ</h4>
      </td>
      <td>
       {{$book->date}} 
      </td>
       
        <td><a href="{{URL::to('/view_order/'.$book->payment_id)}}" class="ui blue button">Xem chi tiết</a>
        </td>
       <!--td>
       
        
       <a  class="ui red button" onclick="return confirm('Bạn chắc chắn muốn xóa đơn hàng này ?')" href="{{URL::to('/delete_order/'.$book->payment_id)}}" >Xóa đơn hàng</a>
       

       </td-->
    </tr>
        @endforeach
  </tbody>

  <tfoot>
    <tr><th colspan="6">
      <div class="ui right floated pagination menu">
        <a class="icon item">
          <i class="left chevron icon"></i>
        </a>
        <a class="active item">1</a>
        <a class="item" >2</a>
        <a class="item" >3</a>
        <a class="item" >4</a>
        <a class="icon item">
          <i class="right chevron icon"></i>
        </a>
      </div>
    </th>
  </tr></tfoot>
</table>

</div>

<script type="text/javascript">
    document.getElementById('a2').className='active item';
  function showtable2(){
    document.getElementById().style.display=''
  }
  function dele(){
$('#dele')
.modal('show')
;
  }
</script>