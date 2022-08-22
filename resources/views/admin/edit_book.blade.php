 @include('admin.layouts.sidebar')
 <div class="ui center aligned container" style="width: 100%;">
 <style type="text/css">
   body{
    background: #767676;
   }
 </style>
   @foreach($allbooks as $book)
<form class="ui inverted form" method="POST" action="{{URL::to('/update_book/'.$book->id)}}" enctype="multipart/form-data" style="margin-left:100px;" >
  @csrf
  <h1 class="ui center aligned header" style="color: white;">Sửa sản phẩm </h1>
   <div class="field">
    <label>Tên game</label>
    <input style="width:600px" type="text" name="book_title" placeholder="Tên sách" value="{{$book->book_title}}">
  </div>
  <div class="field">
    <label>Tên nhà sản xuất</label>
    <input style="width:600px" type="text" name="book_author" placeholder="Tác giả" value="{{$book->book_author}}">
  </div>
   <div class="field">
    <label>Ảnh sản phẩm</label>
    <input style="width:600px" type="file" name="book_image" placeholder="Ảnh" value="{{$book->book_image}}">
  </div>

  <div class="field">
    <label>File game</label>
    <input style="width:600px" type="file" name="book_file" value="{{$book->game_file}}">
  </div>

<div class="field">
    <label>Video sản phẩm</label>
    <input style="width:600px" type="file" name="video" placeholder="Ảnh" value="{{$book->video}}">
  </div>

  <div class="field">
    <label>Mô tả</label>
    <textarea style="width:600px;height:250px" type="text" name="book_descr" placeholder="Mô tả" >{{$book->book_descr}}</textarea>
  </div>
  <div class="field">
    <label>Giá sản phẩm</label>
    <input style="width:600px" type="text" name="book_price" placeholder="Giá" value="{{$book->book_price}}">
  </div>
  <center>
  <div class="field" style="width:600px;">
    <label>Chọn nhà phát hành</label>
    <select class="ui fluid dropdown" name="publisherid">
      <option value="{{$book->publisherid}}" >{{$book->publisher_name}} </option>
        @foreach($pub as $p)
      @if($p -> publisher_name != $book->publisher_name)
<option value="{{$p->publisherid}}">{{$p->publisher_name}} </option>
@endif 
        @endforeach
      </select>
  </div>
</center>
<br>
  <button class="ui black button" type="submit" name="add_book">Cập nhật sản phẩm</button>
</form>
  @endforeach


 </div>