 @include('admin.layouts.sidebar')
 <div class="ui center aligned container" style="width: 100%;">
<div class="ui inverted grey segment">

 @if(\Session::has('success'))
<div class="ui black fixed nag" id="fixednag"  style="font-size: 3ch;">
  <span style="margin-left:50px">{{\Session::get('success') }}</span>
  <i class="close icon" ></i>
</div>
<script type="text/javascript">
   document.getElementById('a3').className='active item';
  $('#fixednag')
.nag({
  persist:true
})
;
</script>
@endif

  @if($errors->any())
@foreach($errors->all() as $error)
<script >
    function thing(){
   $('body')
  .toast({
     class: 'error',
    message: '{{$error}}',
    showProgress: 'bottom',
  })
;
}
window.onload =thing;
  </script>
@endforeach
@endif


<form class="ui inverted form" method="POST" action="{{URL::to('/save_book')}}" enctype="multipart/form-data" style="margin-left:100px">
  @csrf
  <h1 class="ui center aligned header" style="color: white;">Thêm trò chơi </h1>
   <div class="field">
     <label>Tên sản phẩm</label>
    <input style="width:600px" type="text" name="book_title" placeholder="Tên sản phẩm" required="">
  </div>
  <div class="field">
     <label>Tên tác giả</label>
    <input style="width:600px" type="text" name="book_author" placeholder="Tên tác giả" required="">
  </div>
   <div class="field">
     <label>Ảnh sản phẩm</label>
    <input style="width:600px" type="file" name="book_image" required="">
  </div>
  <div class="field">
     <label>File game</label>
    <input style="width:600px" type="file" name="game_file" required="">
  </div>
  <div class="field">
     <label>Video</label>
    <input style="width:600px" type="file" name="video" required="">
  </div>
  <div class="field">
     <label>Mô tả sản phẩm</label>
    <textarea style="width:600px" name="book_descr"  placeholder="Mô tả sản phẩm" ></textarea>
  </div>
  <div class="field">
     <label>Giá sản phẩm</label>
    <input style="width:600px" type="text" name="book_price" placeholder="Giá sản phẩm" required="">
  </div>
  <center>

  <div class="field" style="width:600px">
    <label>Chọn nhà phát hành</label>
    <select class="ui fluid dropdown" name="publisherid">
      @foreach($publisherid as $key => $publisher_id)
        <option value="{{$publisher_id->publisherid}}">{{$publisher_id->publisher_name}}</option>
        @endforeach

      </select>
  </div>
  </center>
    <div class="ui error message"></div>
    <br>
   <div><button class="ui black submit button" type="submit">Thêm trò chơi</button></div>
</form>
    
</div>

 </div>