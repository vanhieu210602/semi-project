 @include('admin.layouts.sidebar')
 <style type="text/css">
   body{
    background: #767676;
   }
 </style>
 <div class="ui center aligned container" style="width: 100%;">
<div class="ui grey inverted segment">
   @foreach($allpublishers as $pub)
<form class="ui inverted form" method="POST" action="{{URL::to('/update_publisher/'.$pub->publisherid)}}" enctype="multipart/form-data" style="margin-left:100px;" >
  @csrf
  <h1 class="ui center aligned header" style="color: white;">Sửa nhà phát hành </h1>
   <div class="field">
    <label>Tên nhà phát hành</label>
    <input style="width:600px" type="text" name="publisher_name" placeholder="Tên sách" value="{{$pub->publisher_name}}">
  </div>
   <div class="field">
    <label>Ảnh nhà phát hành</label>
    <input style="width:600px" type="file" name="image" value="{{$pub->image}}">
  </div>
 
  <button class="ui black button" type="submit" name="update_publisher">Cập nhật</button>
</form>
  @endforeach
</div>

 </div>