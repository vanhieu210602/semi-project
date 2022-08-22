 @include('admin.layouts.sidebar')
 <br>
 <title>Trò chơi</title>
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


<div class="ui modal" id="addgame">
    <div class="center aligned header">Thêm sản phẩm</div>
    <div class="scrolling center aligned content">
      <form class="ui form" method="POST" action="{{URL::to('/save_book')}}" enctype="multipart/form-data">
       @csrf

<div class="field">
     <label>Tên sản phẩm</label>
     <div class="ui focus input"> 
    <input style="width:600px" type="text" name="book_title" placeholder="Tên sản phẩm" required="">
  </div>
  </div>
  <div class="field">
     <label>Tên tác giả</label>
      <div class="ui focus input"> 
    <input style="width:600px" type="text" name="book_author" placeholder="Tên tác giả" required="">
  </div>
  </div>
   <div class="field">
     <label>Ảnh sản phẩm</label>
      <div class="ui focus input"> 
    <input style="width:600px" type="file" name="book_image" required="">
  </div>
  </div>
  <div class="field">
     <label>File game</label>
      <div class="ui focus input"> 
    <input style="width:600px" type="file" name="game_file" required="">
  </div>
  </div>
  <div class="field">
     <label>Video</label>
      <div class="ui focus input"> 
    <input style="width:600px" type="file" name="video" required="">
  </div>
  </div>
  <div class="field">
     <label>Mô tả sản phẩm</label>
     
    <textarea style="width:600px" name="book_descr"  placeholder="Mô tả sản phẩm" ></textarea>
  </div>
  <div class="field">
     <label>Giá sản phẩm</label>
      <div class="ui focus input"> 
    <input style="width:600px" type="text" name="book_price" placeholder="Giá sản phẩm" required="">
  </div>
  </div>
  
  <div class="field">
    <label>Chọn nhà phát hành</label>
     <div class="ui focus input"> 
    <select class="ui fluid dropdown" name="publisherid" style="width:600px">
      @foreach($publisherid as $key => $publisher_id)
        <option value="{{$publisher_id->publisherid}}">{{$publisher_id->publisher_name}}</option>
        @endforeach

      </select>
    </div>
  </div>
  

    </div>
    <div class="center aligned actions" style="height:150px;padding: 50px;">
      <button class="ui green button">Thêm sản phẩm</button>
      </form>
        <div class="ui negative button">Hủy</div>
    </div>
</div>



 <table class="ui celled padded table" style="text-align:center" >
    <h1 class="ui center aligned header">Bảng sản phẩm</h1>
    <center><button class="ui green button" onclick="$('#addgame').modal('show');">Thêm trò chơi</button></center>
  <thead>
    <tr>
    <th>Tên game</th>
    <th>Ảnh</th>
     <th>Giá</th>
     <th></th>
     <th></th>
  </tr></thead>
  <tbody>
    @foreach($allbooks as $book)
    <tr >
      <td >
     <h4 class="ui center aligned header">{{$book->book_title}}</h4>
      </td>
      <td>
        <img src="resources/img/{{$book->book_image}}" class="ui tiny centered image" >
      </td>
        <td style="font-size:2ch">{{number_format($book->book_price)}} đ</td>
        <td><a href="{{URL::to('/edit_book/'.$book->id.'.'.$book->publisherid)}}" class="ui blue button">Sửa</a></td>
        <td><a  class="ui red button" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này ?')" href="{{URL::to('/delete_book_table1/'.$book->id)}}">Xóa</a></td>
    </tr>
        @endforeach
  </tbody>

  <tfoot>
    <tr><th colspan="6">
<ul class="pagination" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <li>{!! $allbooks->links() !!}</li>
        
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
    document.getElementById('a1').className='active item';
</script>