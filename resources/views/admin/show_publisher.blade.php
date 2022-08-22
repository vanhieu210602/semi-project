 @include('admin.layouts.sidebar')

 @if ($errors->any())
 @foreach ($errors->all() as $error)
<script type="text/javascript">
   $('body')
  .toast({
     class: 'error',
    message: ' {{ $error }}',
  })
;
</script>
 @endforeach
@endif

 <title>Table</title>
 <div class="pusher" style="margin-right: 400px;">
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
<br>
 <table class="ui celled padded table" style="text-align:center" >
    <h1 class="ui center aligned header">Nhà phát hành</h1>
<center><a class="ui green button" onclick="$('#addpub').modal('show')">Thêm nhà phát hành mới</a></center> 

<div class="ui small modal" id="addpub" >
  <div class="center aligned header">Thêm nhà phát hành mới</div>
  <div class="center aligned content">
    <form class="ui form" method="POST" action="{{URL::to('/save_publisher')}}" enctype="multipart/form-data">
       @csrf
        <div class="field">
            <label>Tên nhà phát hành</label>
             <div class="ui focus input">
  <input id="name" type="text" style="width: 600px;" placeholder="Tên nhà phát hành" name="publisher_name" required>
</div>
  </div>
    
 <div class="field">
     <label>Ảnh nhà phát hành</label>
     <div class="ui focus input">
    <input style="width:600px" type="file" name="image" required="">
    </div>
  </div>
  </div>
    <div class="center aligned actions">
    <button class="ui positive right labeled icon button" type="submit">
      Thêm
      <i class="checkmark icon"></i>
    </button>
     </form>
      <button onclick="exit()" class="ui black deny button">
      Hủy
    </button>
  </div>
</div>


  <thead>
    <tr>
    <th>Tên nhà phát hành</th>
    <th>Ảnh</th>
     <th></th>
     <th></th>
  </tr></thead>
  <tbody>



    @foreach($allpublishers as $pub)

    <tr >
      <td >
     <h4 class="ui center aligned header">{{$pub->publisher_name}}</h4>
      </td>
      <td>
        <img src="resources/img/{{$pub->image}}" style="width: 80px;height: 80px;" class="ui avatar image" >
      </td>

        <td><a href="{{URL::to('/edit_publisher/'.$pub->publisherid)}}" class="ui blue button">Sửa</a>
<a  class="ui red button" onclick="return confirm('Bạn chắc chắn muốn xóa nhà phát hành này ?')" href="{{URL::to('/delete_publisher/'.$pub->publisherid)}}">Xóa</a>
        </td>
       
    </tr>
        @endforeach
  </tbody>

  <tfoot>
    <tr><th colspan="6">
<ul class="pagination" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <li>{!! $allpublishers->links() !!}</li>
        
</ul>

    </th>
  </tr></tfoot>
</table></div>

<script type="text/javascript">
  function showtable2(){
    document.getElementById().style.display=''
  }
  function dele(){
$('#dele')
.modal('show')
;
  }
    document.getElementById('a0').className='active item';
</script>