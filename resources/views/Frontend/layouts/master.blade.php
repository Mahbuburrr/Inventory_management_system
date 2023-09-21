
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>

@include('frontend.layouts.header')

@yield('content')
@include('frontend.layouts.footer')



<!-- Scroll Function apply -->

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="gotoup">
        <img src="{{asset('frontend/image/scroll')}}" alt="">
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">$(document).ready(function(){
$(window).scroll(function(){
  if($(this).scrollTop()>300){
    $('.gotoup').fadeIn();
  }
  else{
    $('.gotoup').fadeOut();
  
  }
 
 })
 $('.gotoup').click(function(){
  $('html,body').animate({scrollTop:0},1000);
})
});</script>
    <script src="frontend/js/bootstrap.bundle.min.js" ></script>
</body>
</html>