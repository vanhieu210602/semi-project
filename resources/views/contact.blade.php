@include('layouts.user.header')
  <br><br>
  <div id="bd">
  <div id="banner_back" class="ui center aligned header" style="background:linear-gradient(to right, rgb(201, 75, 75), rgb(75, 19, 79));height:250px;padding: 50px;"><h1 id="banner" style="font-size: 5ch;color: white;transition: 0.7s;">Xin chào, GGshop có thể<br> giúp gì cho bạn?</h1></div>
 <div id="banner_des" class="ui center aligned header" ><h1 style="font-size:3.5ch;font-weight:lighter;color: white;margin-top: 20px;">Chăm sóc khách hàng GGshop
 </h1><p  style="font-weight:lighter;color: white;">Chúng tôi muốn lắng nghe câu hỏi và ý kiến đóng góp từ bạn. Hãy phản hồi cho GGshop biết vấn đề của bạn nhé! Chúng tôi sẽ liên hệ lại bạn trong 24h tiếp theo.</p></div>
 <hr style="background: #004687"><br>
 <style type="text/css">
    body{
  background:#2B2C2D;
}
 #lienhe{
  background: #2B2C2D;
  filter: brightness(1.1);
}
 </style>
  <script type="text/javascript">
     document.getElementById("lienhe").className = "active item";
</script>
<div  class="ui container" >
<center><form id="form" class="ui form segment" action="{{URL::to('/send_contact')}}" method="POST" style="padding: 20px;width:700px;text-align: left; font-size: 2ch;">
  @csrf
    <div class="field">
      <label>Địa chỉ email của bạn</label>
      <input style="background:whitesmoke;" name="email" type="email" >
    </div>
    <div class="field">
      <label>Nội dung phản hồi</label>
      <textarea style="background:whitesmoke;" name="content"></textarea>
    </div>
  <center><button class="ui submit black button">Gửi phản hồi</button></center>
  <div class="ui error message"></div>
  <script type="text/javascript">
    $('.ui.form')
  .form({
    fields: {
      email: {
        identifier: 'email',
        rules: [
       
          {
            type   : 'email',
            prompt : 'Vui lòng nhập email hợp lệ '
          }
        ]
      },
       text: {
        identifier: 'text',
        rules: [
       
          {
            type   : 'empty',
            prompt : 'Vui lòng nhập nội dung '
          },
           {
            type   : 'minLength[20]',
            prompt : 'Nội dung tối thiểu {ruleValue} kí tự'
          }
        ]
      },
    }
  })
;
  </script>
</form>
</center>
</div>
</div>

<div class="ui black top fixed nag" id="topfixednag" style="height:50px">
  <h3 style="color:white;">Cảm ơn bạn đã phản hồi <3</h3>
  <i class="close icon"></i>
</div>


<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
<div class="ui center aligned container" id="send_contact_icon" style="display: none;margin-top:100px"> 
<lord-icon
    src="https://cdn.lordicon.com/rhvddzym.json"
    trigger="loop"
    colors="primary:white,secondary:white"
    style="width:250px;height:250px;">
</lord-icon>
<h2 style="margin-top: -30px">Đang gửi phản hồi...</h2>
<div style="height:250px"></div>
</div>

 @if(\Session::has('success'))
<script >
   $('#send_contact_icon').transition('scale');
    $('#bd').transition('fade');

   setTimeout(()=>{
  $('#send_contact_icon').transition('scale');
  $('#bd').transition('fade');
   },3000);
   setTimeout(()=>{
$('#topfixednag')
.nag({
  persist:true
})
;
},3500);
  </script>
@endif

@include('layouts.user.footer')
 