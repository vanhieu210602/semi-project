  @include('layouts.user.header')
<?php
$content=Cart::content();
if(count($content)==0){
  echo '<script>
 window.location.href = "http://localhost:7882/webcuoiki/show_cart";
  </script>';
}
?>
<script type="text/javascript">
      document.getElementById("header").style.visibility= "visible";
</script>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
 font-family: Helvetica ;
    font-size: 2.2ch;
    background: #DCDCDC;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}



input{
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}


hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}
textarea { 
   /* will prevent resizing horizontally */
   resize:vertical;
    width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<h1 class="ui center aligned header" style="margin-top:80px">Thanh to??n</h1>
<div class="ui container" style="background:white;padding: 15px;border-radius: 20px;">
<div class="row" style="margin-top: 30px;">
  <div class="col-75">
       <form action="{{URL::to('save_checkout')}}" method="POST">
              @csrf
              <input type="hidden" name="payment_status" value="??ang ch??? x??c nh???n">
        <div class="row">
          <div class="col-50">
            <h3>Th??ng tin ng?????i mua </h3>
            <label>H??? v?? t??n ng?????i mua</label>
            <input type="text" id="fname" name="buy_name" placeholder="H??? v?? t??n" required>
            <label>S??? ??i???n tho???i</label>
            <input type="tel" id="email" name="phone_number" placeholder="S??? ??i???n tho???i" required>
             <input type="hidden" id="fname" name="customer_email" value="{{ Auth::user()->email }}">
               <input type="hidden" id="fname" name="customer_id" value="{{ Auth::user()->id }}">

                <div id="cardpay" >
  <h3>Th??ng tin th??? </h3>

            <label for="fname" >C??c lo???i th??? ???????c ch???p nh???n</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label>H??? v?? t??n ch??? th???</label>
            <input type="text" name="card_name" placeholder="T??n ch??? th???">
            <label>S??? t??i kho???n</label>
            <input type="text" id="ccnum" name="card_number" placeholder="S??? t??i kho???n">
            <div class="row">
              <div class="col-50">
                <label>Th??ng h???t h???n c???a th???</label>
                <input value="1" type="number" min="1" max="12" id="expmonth" name="exp_month" placeholder="Th??ng h???t h???n">
              </div>
              <div class="col-50">
                <label>N??m h???t h???n c???a th???</label>
                <input value="2021" type="number" min="2021" max="2050" id="expyear" name="exp_year" placeholder="N??m h???t h???n">
              </div>
              <div class="col-50">
                <label>M?? CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="CVV">
              </div>
            </div>
          </div>
            
          </div>
          
        </div>
        <input type="submit" id="complete" value="Ho??n t???t thanh to??n" class="ui large green button">
        <hr>
        <a href="{{URL::to('show_cart')}}"><input type="button" value="H???y" class="ui large grey button"></a>
      </form>
  </div>
  <div class="col-25">
    <div class="container">
<h3>Xem l???i gi??? h??ng<i class="cart arrow down icon" style="margin-left: 20px;"></i><?php echo count($content)?></h3>
<div class="ui blue segment" >
  <div class="ui  relaxed divided list" style="font-size:2ch">
     @foreach($content as $v_content)
    <div class="item">
      <div class="content" >
        <div class="header" style="padding:5px">{{$v_content->name}}</div>
        <div style="text-align:left;">S??? l?????ng : {{$v_content->qty}}</div>
       <div style="text-align:right;">Gi?? : {{(number_format($v_content->price))}} ??</div>
      </div>
    </div>
    @endforeach
  </div>
</div>

      <hr style="background: #2185d0;">
      <p  style="font-size:2ch">T???ng ti???n c???n ph???i tr???<span class="price" style="color:black"><b style="color:#2185d0"><br> {{(Cart::subtotal())}} ??</b></span></p>
    </div>
  </div>
</div>

</div>
 @include('layouts.user.footer')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
