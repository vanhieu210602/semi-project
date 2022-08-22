 @include('admin.layouts.sidebar')

 <div class="pusher" style="margin-right:400px;">
  <br>
<h1 class="ui center aligned header">Quản trị viên</h1>
<div class="ui three cards" style="margin-top: 0px;">
  <div class="ui blue card">
    <div class="center aligned content">
      <div class="header"> <i class="huge fantasy flight games icon"></i><br><br>{{$gamestotal}} sản phẩm</div>
      <br>
      <div class="description">
        <a href="{{URL::to('show_table.1')}}" class="ui blue button">Xem chi tiết</a>
      </div>
    </div>
  </div>  
  <div class="ui orange card">
    <div class="center aligned content">
      <div class="header">  <i class="huge clipboard outline icon"></i><br><br>{{$ordertotal}} Đơn hàng</div>
      <br>
      <div class="description">
        <a  href="{{URL::to('order')}}" class="ui orange button">Xem chi tiết</a>
      </div>
    </div>
  </div>
 <div class="ui red card">
    <div class="center aligned content">
      <div class="header"> <i class="huge user icon"></i><br><br>{{$usertotal}} Người dùng</div>
    </div>
  </div>
</div>

</div>

<script type="text/javascript">
  document.getElementById('a').className='active item';
</script>