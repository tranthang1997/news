<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Tin Việt</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{!! url('public/user/assets/css/bootstrap.min.css') !!}">
		<link rel="stylesheet" type="text/css" href="{!! url('public/user/assets/css/font-awesome.min.css') !!}">
		<link rel="stylesheet" type="text/css" href="{!! url('public/user/assets/css/animate.css') !!}">
		<link rel="stylesheet" type="text/css" href="{!! url('public/user/assets/css/font.css') !!}">
		<link rel="stylesheet" type="text/css" href="{!! url('public/user/assets/css/li-scroller.css') !!}">
		<link rel="stylesheet" type="text/css" href="{!! url('public/user/assets/css/slick.css') !!}">
		<link rel="stylesheet" type="text/css" href="{!! url('public/user/assets/css/jquery.fancybox.css') !!}">
		<link rel="stylesheet" type="text/css" href="{!! url('public/user/assets/css/theme.css') !!}">
		<link rel="stylesheet" type="text/css" href="{!! url('public/user/assets/css/style.css') !!}">
		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.min.js"></script>
		<script src="../assets/js/respond.min.js"></script>
		<![endif]-->
    <body>
    <div id="preloader">
  		<div id="status">&nbsp;</div>
	</div>
	<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
	<div class="container">
		@include('user.blocks.header')
			@include('user.blocks.nav')
			@yield('content')
			@include('user.blocks.footer')
	</div>
	<!--  -->
		<script src="{!! url('public/user/assets/js/jquery.min.js') !!}"></script> 
		<script src="{!! url('public/user/assets/js/wow.min.js') !!}"></script> 
		<script src="{!! url('public/user/assets/js/bootstrap.min.js') !!}"></script> 
		<script src="{!! url('public/user/assets/js/slick.min.js') !!}"></script> 
		<script src="{!! url('public/user/assets/js/jquery.li-scroller.1.0.js') !!}"></script> 
		<script src="{!! url('public/user/assets/js/jquery.newsTicker.min.js') !!}"></script> 
		<script src="{!! url('public/user/assets/js/jquery.fancybox.pack.js') !!}"></script> 
		<script src="{!! url('public/user/assets/js/custom.js') !!}"></script>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59c617a752464ce1"></script> 
    </body>
</html>