<script src="{{asset('resources/js/jquery.js')}}"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
<script src="{{asset('resources/js/semantic-ui.js')}}"></script>
  <body>

    <style type="text/css">
      body{
        background:  #DCDCDC;
      }
    </style>
 <div class="ui left demo visible vertical inverted sidebar labeled icon menu">
  <a id="a" class="item" href="{{url('/admin_home')}}">
 <i class="user lock icon"></i>
   <p><?php $name= Session::get('admin_name'); 
  echo $name ?></p>
  </a>
   <a id="a0" href="{{URL::to('show_publisher')}}" class="item">
  <i class="upload icon"></i>
    Nhà phát hành
  </a>
  <a id="a1" href="{{URL::to('show_table.1')}}" class="item">
  <i class="fantasy flight games icon"></i>
    Sản phẩm
  </a>
  <a id="a2" href="{{URL::to('order')}}" class="item">
   <i class="clipboard outline icon"></i>
    Đơn hàng
  </a>
  <a id="a5" href="{{URL::to('xembinhluan')}}" class="item">
    <i class="comment icon"></i>
    Bình luận
  </a>
  <a href="{{url('/thongke')}}" id="a6" class="item"> <i class="chart pie icon"></i>Thống kê</a>
  <a id="a4" class="item" href="{{URL::to('/admin_logout')}}" >
  <i class="sign out alternate icon"></i>Đăng xuất</a>
</div>
</body>

@if($errors->any())
<script >
   $('body')
  .toast({
    class: 'error',
    message: `{{$errors->first() }}`,
    showProgress: 'bottom',
  })
;
  </script>
@endif