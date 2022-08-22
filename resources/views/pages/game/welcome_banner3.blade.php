
 <h1 id="banner3-title" >Game sắp ra mắt</h1>
<div id="banner3" >
  <img id="banner3img" src="https://i1.wp.com/theplaystationbrahs.com/wp-content/uploads/2021/04/maxresdefault-7.jpg?fit=1280%2C720&ssl=1">
  <button id="banner3button" class="ui black big button" >Mở rộng</button>
  <div id="allbanner3img" >
 <div id="banner3-caption" >
    Resident Evil: Re-verse<br>
  <p id="banner3-caption-1" >Dự kiến ra mắt vào năm 2022 </p>
</div>

<div id="banner3img3">
    <h1 style="">Jack Baker</h1>
 <img  src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/8f7ecefd-3534-4257-b67d-5fa370c6cbf8/dco017p-323fa450-0a54-451d-b4e9-b5913f5cb21b.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzhmN2VjZWZkLTM1MzQtNDI1Ny1iNjdkLTVmYTM3MGM2Y2JmOFwvZGNvMDE3cC0zMjNmYTQ1MC0wYTU0LTQ1MWQtYjRlOS1iNTkxM2Y1Y2IyMWIucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.BhHJoja225I1b0L_yZnNPGzrHELOt_LKBTx6Yso85Ik">
 </div>
  
  <div id="banner3img1" >
       <h1 style=" color:white;text-align: center;">Ada Wong</h1>
 <img  src="https://upload.wikimedia.org/wikipedia/en/4/4f/Ada_Wong_in_Resident_Evil_2_remake.png">
 </div>

<div id="banner3img2" >
     <h1 style="color:white;text-align: center;transform: translateY(80px);">Xemesix</h1>
 <img style=" height:950px;" src="https://i.pinimg.com/originals/61/e1/b3/61e1b356f181649cdfa4e85e8144df7a.png">
    </div>  

  </div>

 
</div>

<script type="text/javascript">
  $('#banner3button').click(function(){
      $('#banner3button').transition('fade');

      setTimeout(()=>{
        document.getElementById('banner3img').style.filter='brightness(20%)';
 $('#banner3caption').transition('fade up');
  $('#banner3img2').transition('fade up');
      },500);

      setTimeout(()=>{
 $('#banner3img1').transition('fade left');
      },900);

       setTimeout(()=>{
 $('#banner3img3').transition('fade right');
 
      },1300);
         setTimeout(()=>{
 $('#banner3-caption').transition('fly down');
      },1700);

      $('#banner3').animate({height:'600px'});
       $('html,body').animate({
        scrollTop: $("#banner3").offset().top},
        'normal');
  })

</script>