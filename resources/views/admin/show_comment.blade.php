 @include('admin.layouts.sidebar')
 <title>Bình luận</title>
 <style type="text/css">
      body{
        background: #DCDCDC;
      }
    </style>
 <div class="pusher" style="margin-right:400px">
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
  
  
 <table class="ui celled padded table" style="text-align:center" >
    <br>
    <h1 class="ui center aligned header">Duyệt và trả lời bình luận</h1>
  <thead>
    <tr>
        <th>Trạng thái</th>
    <th class="single line">Tên người gửi</th>
    <th>Bình luận</th>
    <th>Đánh giá sao</th>
    <th>Ngày gửi</th>
     <th>Sản phẩm</th>
     <th>Tùy chỉnh</th>
    
  </tr></thead>
  <tbody>
    @foreach($allcomments as $comm)
    <tr>
        <td>
             @if($comm->status == '0')
            <a class="ui small green button" name="status" href="{{URL::to('/duyetbinhluan/'.$comm->comment_id)}}">Duyệt</a>
            @else 
            <a style="width:100px" class="ui small black button" name="status" href="{{URL::to('/boduyetbinhluan/'.$comm->comment_id)}}">Bỏ duyệt</a>
            @endif
        </td>
      <td >
     <a name="publisherid">{{$comm->user_post_name}}</a>
      </td>

 <td> <br>
     <h4 class="ui center aligned header" style="margin-top: -20px">{{$comm->comment_content}}</h4>
       @foreach($comments as $key =>$com_reply)
    @if($com_reply->comment_id ==$comm->comment_id)
    <li>{{$com_reply->reply_comment_content}}<a href="{{URL::to('/xoaphanhoi/'.$com_reply->comment_id)}}"><i style="margin-left:5px;color: #db2828;" class="trash alternate icon"></i></a></li>
    @endif
    @endforeach
    <br>
    @if($comm->status == '1')
     <form action="{{URL::to('traloibinhluan')}}" method="POST">
         @csrf
         <input type="hidden" name="comment_id" value="{{$comm->comment_id}}">
       
          <textarea style="height:50px" name="reply_comment_content"></textarea>
     <br><br>
     <button class="ui small blue button" type="submit">Trả lời bình luận</button>
     </form>
     @else 
     @endif
      </td>

        <td>
             @php 
      $tr=$comm->rating;
      @endphp
     @for($count=0;$count<$tr;$count++)
       <i class="star icon" style="color:orange;font-size:1.4ch"></i>
@endfor
        </td>
      <td >
          <h4>{{$comm->date}}</h4>
      </td>
       <td>
          <h4>{{$comm->book_title}}</h4>
      </td>
      <td>
          <a style="width:130px" href="{{URL::to('/xoabinhluan/'.$comm->comment_id)}}" class="ui small red button">Xóa bình luận</a>
      </td>
    </tr>
        @endforeach
  </tbody>

  <tfoot>
    <tr><th colspan="7">
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
</table></div>

<script type="text/javascript">
    document.getElementById('a5').className='active item';
  function showtable2(){
    document.getElementById().style.display=''
  }
  function dele(){
$('#dele')
.modal('show')
;
  }
</script>