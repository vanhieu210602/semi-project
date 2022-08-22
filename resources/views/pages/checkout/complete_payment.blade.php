 @include('layouts.user.header')
<h1 id="h1" style="margin-top: 100px;font-size: 4ch;" class="ui center aligned header">Cảm ơn bạn đã mua hàng !</h1>
<h1 class="ui center aligned header" id="h2" ><i id="icon" class="check circle outline icon" style="color:green;font-size: 6ch;"></i></h1>
<script type="text/javascript">
      document.getElementById("header").style.visibility= "visible";

</script>

<div>
    <h1 id="thongbaotaigame" class="ui center aligned header" >Game sẽ tự động tải sau <span id="s"></span></h1>
    <h3 id="thongbaoloi" style="text-align: center;display: none;">Không tự động tải game xuống ? Hãy click vào nút tải game ở bên dưới.. </h3>
</div>

<div class="ui center aligned container" style="margin-top:50px">

<table class="ui celled inverted table" style="">
  <thead>
    <tr>
      <th>Tên game</th>
      <th>Dung lượng</th>
      <th>File game</th>
    </tr>
  </thead>
  <tbody>

    @foreach($game as $g)
    <tr>
      <td>  <span>  <img style="height:60px;width:60px" class="ui avatar image" src="{{asset('resources/img/'.$g->book_image)}}"></span>{{$g -> product_name}}</td>
      <td>10 GB</td>
      <td>  <a id="d" class="ui green button"  download="" target="_blank"><i class="arrow down icon"></i>Tải game</a>
  
  <script type="text/javascript">
    setTimeout(()=>{
     document.getElementById('d').href="{{asset('resources/games/'.$g->game_file)}}";
          document.getElementById('d').click();
        },6000);
  </script>

<script language="javascript">
    var s = 5; // Giây
    var timeout = null; // Timeout
    function start()
    {
     if (s == -1){
        clearTimeout(timeout);
      document.getElementById('icon').style.color='green';
        $('#thongbaotaigame').transition('fade');
        setTimeout(()=>{
   $('#thongbaoloi').transition('fade');
        },1000)
          
        return false;
    }
     
    document.getElementById('s').innerText = s.toString();
 
    timeout = setTimeout(function(){
        s--;
        start();
    }, 1000);
    }
    window.onload=start;
 
    function stop(){
        clearTimeout(timeout);
    }
</script>


      </td>
    </tr>
    @endforeach
  </tbody>

</table>


</div>







<center style="margin-top:50px"><a style="background:#002649;color: white;" class="ui button" href="{{url('/xemdonhang/'. Auth::user()->id)}}">Xem đơn hàng đã mua</a>   
<a class="ui blue button" href="{{url('/')}}">Tiếp tục mua hàng</a>
</center>
<div style="height:80px"></div>
 @include('layouts.user.footer')