 @include('admin.layouts.sidebar')
  <script type="text/javascript">
      document.getElementById('a6').className='active item';
  </script>
  <div class="pusher" style="margin-right:400px">
     <div id="container" data-order="{{ $orderDay }}" style="margin-top:10px;width: 100%;height: 500px;transform: scale(1.05);"></div> 
 

<script type="text/javascript">
	$(document).ready(function(){
    var order = $('#container').data('order');
    var listOfValue = [];
    var listOfYear = [];
    order.forEach(function(element){
        listOfYear.push(element.getDay);
        listOfValue.push(element.value);
    });
    console.log(listOfValue);
    var chart = Highcharts.chart('container', {

        title: {
            text: 'Thống kê doanh thu theo ngày'
        },

        xAxis: {
            categories: listOfYear,
        },
        yAxis: {

            title: {
                text: 'Doanh thu'

            }

        },

        series: [{
            name :'Tổng tiền (VNĐ)',
            type: 'column',
            colorByPoint: true,
            data: listOfValue,
            showInLegend: false
        }]
    });
    
    $('#plain').click(function () {
        chart.update({
            chart: {
                inverted: false,
                polar: false
            },
            subtitle: {
                text: 'Plain'
            }
        });
    });

    $('#inverted').click(function () {
        chart.update({
            chart: {
                inverted: true,
                polar: false
            },
            subtitle: {
                text: 'Inverted'
            }
        });
    });

    $('#polar').click(function () {
        chart.update({
            chart: {
                inverted: false,
                polar: true
            },
            subtitle: {
                text: 'Polar'
            }
        });
    });
});

</script>

<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
    


<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic|Montserrat:400,700);
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font: inherit;
  font-size: 94%;
  vertical-align: baseline;
}


ol, ul {
  list-style: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

caption, th, td {
  text-align: left;
  font-weight: normal;
  vertical-align: middle;
}

q, blockquote {
  quotes: none;
}
q:before, q:after, blockquote:before, blockquote:after {
  content: "";
  content: none;
}

a img {
  border: none;
}

article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
  display: block;
}

* {
  box-sizing: border-box;
}

body {
  color: #333;
  -webkit-font-smoothing: antialiased;
  font-family: "Montserrat", sans-serif;
  padding: 2%;
  background:  #DCDCDC;
}

.wrap {
  width: 100%;
  margin: 0 auto;
}

h1 {
  font-family: "Montserrat", sans-serif;
  font-weight: bold;
  text-align: center;
  font-size: 1.5em;
  padding: .5em 0;
  margin-bottom: 1em;
  border-bottom: 1px solid #dadada;
  letter-spacing: 3px;
  text-transform: uppercase;
}

ul li {
  line-height: 2;
  font-weight: bold;
  font-family: "Montserrat", sans-serif;
  font-size: .85em;
  text-transform: uppercase;
  clear: both;
}
ul li:before {
  content: "\2023";
  padding: 0 1em 0 0;
}

.bar {
  background: #e74c3c;
  width: 0;
  margin: .25em 0;
  color: #fff;
  transition: width 2s, background .2s;
  -webkit-transform: translate3d(0, 0, 0);
  clear: both;
}
.bar:nth-of-type(2n) {
  background: #ed7669;
}
.bar .label {
  font-size: .75em;
  padding: 1em;
  background: #3d3d3d;
  width: 7em;
  display: inline-block;
  position: relative;
  z-index: 2;
  font-weight: bold;
  font-family: "Montserrat", sans-serif;
}
.bar .label.light {
  background: #575757;
}

.count {
  position: absolute;
  right: .25em;
  top: .75em;
  padding: .15em;
  font-size: .75em;
  font-weight: bold;
  font-family: "Montserrat", sans-serif;
}

</style>



<div class="wrap" style="transform: scale(1.3);margin-top: 100px;margin-left: 100px;">
  <h1 style="margin-right:100px">Thống kê tỉ lệ sản phẩm bán ra</h1>
<div class="holder">


@foreach($gamePercent as $gp)
<div class="bar cf" data-percent="<?php echo ($gp->sumpr)/count($game)*100 ?>%"><span  class="label">{{$gp->pname}}</span></div>
@endforeach





</div>
  </div>

<script type="text/javascript">
    setTimeout(function start (){
  
  $('.bar').each(function(i){  
    var $bar = $(this);
    $(this).append('<span class="count"></span>')
    setTimeout(function(){
      $bar.css('width', $bar.attr('data-percent'));      
    }, i*100);
  });

$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).parent('.bar').attr('data-percent')
    }, {
        duration: 2000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now) +'%');
        }
    });
});

}, 300)

</script>

<!--form method="POST" action="{{url('/tk')}}">
    @csrf
<p>Date: <input type="text" id="datepicker1" name="start"></p>
<br>
<p>Date: <input type="text" id="datepicker2" name="end"></p>
 <script>
  $( function() {
    $( "#datepicker1" ).datepicker();

  } );
  </script>
<input type="submit" name="" value="save">
</form-->







    </div>
    <div style="height:300px"></div>

      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">