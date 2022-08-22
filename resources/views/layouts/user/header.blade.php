<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
<link rel="shortcut icon" href="resources/img/icon.png">

   <script src="{{asset('resources/js/jquery.js')}}"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
<script src="{{asset('resources/js/semantic-ui.js')}}"></script>
<script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  

</head>
<body>
    <div id="app">
        <nav  class="ui small inverted top fixed hidden menu" id="header" style="height: 45px;background:linear-gradient(to right, rgb(201, 75, 75), rgb(75, 19, 79));">
            <div class="ui container">
                <a id="trangchu" class="item" href="{{ url('/') }}">
                <i style="margin-left:5px" class="large store alternate icon"></i>Trang chủ</a>

                <a id="nhaxuatban"  class="item" href="{{ url('/nhaphathanh') }}"><i class="large stream icon" ></i>Nhà Phát hành </a>
                
                <a id="sach" class="item"  href="{{ url('/khogame') }}"><i class="large fantasy flight games icon" ></i>Kho game</a>
                
                <a id="lienhe" class="item"  href="{{ url('/lienhe') }}"><i class="large envelope square icon" ></i>Chăm sóc khách hàng</a>
             
                <a data-html="<?php $sl=Cart::content(); 
                  if(count($sl)==0){
                    echo "Chưa có sản phẩm !";
                echo "<script>document.getElementById('table').style.display='none'</script>"; 
                  }
            ?>
        <table style='width:400px' id='table' class='ui  celled table' >
  <thead >
    <tr><th class='right marked blue' >Sản phẩm</th>
        <th >Số lượng</th>
    <th>Tổng</th>
  </tr></thead>
  <tbody>
    @foreach($sl as $v_content)
    <tr>
      <td  class='left marked blue' style='font-weight:bold;color:#2185d0'>{{$v_content->name}}</td>
      <td style='font-weight:bold;color:#2185d0'>{{$v_content->qty}}</td>
      <td class='right marked blue' style='font-weight:bold;color:#2185d0 '>{{number_format($v_content->price * $v_content->qty)}} đ</td>
    </tr>
    @endforeach
  </tbody>
</table>" 
               id="giohang" class="item"  href="{{ url('/giohang') }}"><i class="large opencart  icon"></i>Giỏ hàng<?php echo '<div class="ui red label">' .count($sl).'</div>' ?></a>
<script type="text/javascript">
    $('#giohang').popup();
</script>
                <a class="item"> <form action="{{URL::to('/timkiem')}}" method="get" autocomplete="off">
    @csrf  
                    <div class="ui search">
  <div class="ui focus icon input ">
    <input style="width:240px;padding: 10px 20px;
    outline: none;
    border-radius: 4px
    " class="prompt" name="country_name" id="country_name" type="text" placeholder="Tìm kiếm game...">
     <i class="search icon"></i>
  </div>
    <div  class="results" id="countryList"></div>
</div>
</form></a>

                    <!-- Right Side Of Navbar -->
                    <div class="right menu">
                        <!-- Authentication Links -->
                        @guest
                            <div class="item" >
                                <a class='ui inverted basic button'  href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                            </div>
                           
                        @else
 
<div class="ui modal" id="profile">
  <div class="header">
    Cài đặt tài khoản
  </div>
  <div class="image content">
    <div class="ui medium image">
      <img src="https://cdn.dnaindia.com/sites/default/files/styles/full/public/2019/06/13/835815-meme-3.jpg">
    </div>
     <div class="description">
  <form class="ui form" method="POST" action="{{URL::to('/update_user/'.Auth::user()->id)}}">
    @csrf
  <div class="field">
    <label>Tên tài khoản</label>
    <input type="text" name="name" value="{{Auth::user()->name}}" style="width: 500px;" required="">
  </div>
  <div class="field">
    <label>Email</label>
    <input type="text" name="email" value="{{Auth::user()->email}}" required="">
  </div>
  <div class="field">
    <button class="ui positive right labeled icon button" type="submit"> 
      Cập nhật
      <i class="checkmark icon"></i>
    </button>
    </form>
  </div>
<br>
 <div class="field">
     
  </div>
   </div>
  </div>
  <div class="actions">
      <button class="ui button" onclick="pass()">Đổi mật khẩu</button> 
    <div class="ui black deny button">
      Thoát
    </div> 
  </div>
</div>

<div class="ui mini modal" id="pass">
  <div class="header">
    Đổi mật khẩu
  </div>
  <div class="image content">
     <div class="description">
  <form class="ui form" method="POST" action="{{URL::to('/change_pass/'.Auth::user()->id)}}">
    @csrf 
  <div class="field">
    <label>Mật khẩu cũ</label>
    <input type="password" name="old_pass" value="" required="">
  </div>
  <div class="field">
    <label>Mật khẩu mới</label>
    <input type="text" name="password" value="" required="">
  </div>
   <!--div class="field">
    <label>Nhập lại mật khẩu mới</label>
    <input type="text" name="cpass" value="" required="">
  </div-->
  <center>
  <div class="field">
      <button class="ui positive right labeled icon button" type="submit">
      Thay đổi
      <i class="checkmark icon"></i>
    </button>
  </div>
  <div class="field">
      <div class="actions">
    </form>
    <div class="ui blue deny button" onclick="user_profile()">
      Trở lại
    </div>
  </div>     
  </div></center>

   </div>
  </div>
</div>

                        <div class="item" >                           
<div id="user" class="ui small compact menu" style="height: 30px;">
  <div class="ui simple inline dropdown item" style="color:black;font-size: 1.8ch;font-weight: bold;">
    <i class="user icon"></i>
                                    {{ Auth::user()->name }}
    <i class="dropdown icon"></i>
    <div class="menu" >
       <a class="item" href="{{url('/xemdonhang.'. Auth::user()->id)}}">Lịch sử mua hàng</a>
      <a class="item" onclick="user_profile()">Cài đặt tài khoản</a>
     <a class="item"    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">  <span style="color: red;">Đăng xuất</span></a>
    </div>
  </div>
</div>                        
</div>
                                    <form method="POST" id="logout-form" action="{{ route('logout') }}"  class="d-none">
                                        @csrf
                                    </form>
                        @endguest
                    </div>
                
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
<script>
  $(document).ready(function(){

   $('#country_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
    var query = $(this).val(); //lấy gía trị ng dùng gõ
    if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
    {
     var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
     $.ajax({
      url:"{{ route('autocomplete-ajax') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"POST", // phương thức gửi dữ liệu.
      data:{query:query, _token:_token},
      success:function(data){ //dữ liệu nhận về
       $('#countryList').fadeIn(200);  
       $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
     }
   });
   }
 });

   $(document).on('click', 'li', function(){  
    $('#country_name').val($(this).text());  
    $('#countryList').fadeOut(200);  
  });  

 });

  $(document).click(function (e)
{
    // Đối tượng container chứa popup
    var container = $("#countryList");
 
    // Nếu click bên ngoài đối tượng container thì ẩn nó đi
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
         $('#countryList').fadeOut(200);  
    }
});

  function user_profile(){
    $('#profile')
  .modal('show');
  }
  function pass(){  
    $('#pass') .modal({
    allowMultiple: true
  }).modal('setting', 'closable', false).modal('show');
  }
</script>


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


@if(\Session::has('success'))
<script >
  
$('body')
  .toast({
     position: 'top right',
    message: `{{\Session::get('success') }}`,
     showProgress: 'bottom',
    classProgress: 'blue',
  })
;
  </script>
@endif


<script type="text/javascript">
  window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("header").style.marginTop = "-50px";
  } else {
    document.getElementById("header").style.marginTop= "0px";
  }
}
</script>







