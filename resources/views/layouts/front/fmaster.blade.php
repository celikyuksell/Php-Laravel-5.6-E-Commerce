<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <!-- Bootstrap styles -->
    <link href="{{url('/')}}/assets/front/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="{{url('/')}}/assets/front/css/style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="{{url('/')}}/assets/front/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="{{url('/')}}/assets/front/css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  </head>
<body>
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="{{$data[0]->twitter}}"><span class="icon-twitter"></span></a>
					<a href="{{$data[0]->facebook}}"><span class="icon-facebook"></span></a>
					<a href="{{$data[0]->youtube}}"><span class="icon-youtube"></span></a>

				</div>
				<a class="active" href="{{url('/')}}"> <span class="icon-home"></span> Home</a> 
				<a href="#"><span class="icon-user"></span> My Account</a> 
				<a href="register.html"><span class="icon-edit"></span> Free Register </a> 
				<a href="contact.html"><span class="icon-envelope"></span> Contact us</a>
				<a href="cart.html"><span class="icon-shopping-cart"></span> 2 Item(s) - <span class="badge badge-warning"> $448.42</span></a>
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="{{url('/')}}"><span>Twitter Bootstrap ecommerce template</span> 
		<img src="{{url('/')}}/assets/front/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
	<div class="span4">
	<div class="offerNoteWrapper">
	<h1 class="dotmark">
	<i class="icon-cut"></i>
	Twitter Bootstrap shopping cart HTML template is available @ $14
	</h1>
	</div>
	</div>
	<div class="span4 alignR">
	<p><br> <strong> Support (24/7) :  0800 1234 678 </strong><br><br></p>
	<span class="btn btn-mini">[ 2 ] <span class="icon-shopping-cart"></span></span>
	<span class="btn btn-warning btn-mini">$</span>
	<span class="btn btn-mini">&pound;</span>
	<span class="btn btn-mini">&euro;</span>
	</div>
</div>
</header>

<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
				<?php
				$home=null;
                $hakkimizda=null;
                $iletisim=null;
                $uye=null;
                $bizeyazin=null;
					if ($menu=='home')
                        $home='active';
					elseif ($menu=='hakkimizda')
                        $hakkimizda='active';
					elseif ($menu=='iletisim')
                        $iletisim='active';
					elseif ($menu=='uye')
                        $menu='active';
					elseif ($bizeyazin=='bizeyazin')
                        $bizeyazin='active';

				?>


			  <li class="{{$home}}"><a href="{{url('/')}}">Home	</a></li>
			  <li class="{{$hakkimizda}}"><a href="{{url('/')}}/hakkimizda">Hakkımızda</a></li>
			  <li class=" "><a href="{{url('/')}}/hakkimizda">Kampanyalar</a></li>
			  <li class=" "><a href="{{url('/')}}/hakkimizda">Duyurlar</a></li>
			  <li class=" "><a href="{{url('/')}}/hakkimizda">İndirimler</a></li>
			  <li class="{{$iletisim}}"><a href="{{url('/')}}/iletisim">İletişim</a></li>
					<li class="{{$bizeyazin}}"><a href="{{url('/')}}/bize_yazin">Bize Yazın</a></li>
				@if (Auth::check())

						<li class="{{$uye}}" >
							<a  href="{{url('/')}}/user">{{Auth::user()->name}}</a>
						</li>

						<li class="{{$uye}}" >
							<a  href="{{url('/')}}/sepetim">Sepetim</a>
						</li>

					@endif

			</ul>
			<form action="#" class="navbar-search pull-left">
			  <input type="text" placeholder="Search" class="search-query span2">
			</form>
			  @if (!Auth::check())

			<ul class="nav pull-right">
			<li class="dropdown {{$uye}}">



				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
				<div class="dropdown-menu">

				<form class="form-horizontal loginFrm" method="post" action="{{url('/')}}/login">
					@csrf
				  <div class="control-group">
					<input type="email" name="email" class="span2"  placeholder="Email" required>
				  </div>
				  <div class="control-group">
					<input type="password" class="span2" name="password" placeholder="Password" required>
				  </div>
				  <div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Remember me
					</label>
					<button type="submit" class="shopBtn btn-block">Login</button>
				  </div>
				</form>
					<button href="{{url('/')}}/logout" class="shopBtn btn-info">Logout</button>

				</div>
			</li>


			</ul>
			  @endif
		  </div>
		</div>
	  </div>
	</div>
<!-- 
Body Section 
-->
	<div class="row">
<!-- 
Side bar
-->
@yield('sidebar')

	<div class="span9">
	<!-- 
Slider
-->
@yield('slider')
<!--
content -orta içerik

-->
@yield('content')
<!-- 
Clients 
-->
<section class="our_client">
	<hr class="soften"/>
	<h4 class="title cntr"><span class="text">Manufactures</span></h4>
	<hr class="soften"/>
	<div class="row">
		<div class="span2">
			<a href="#"><img alt="" src="{{url('/')}}/assets/front/img/1.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="{{url('/')}}/assets/front/img/2.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="{{url('/')}}/assets/front/img/3.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="{{url('/')}}/assets/front/img/4.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="{{url('/')}}/assets/front/img/5.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/6.png"></a>
		</div>
	</div>
</section>

<!--
Footer
-->
<footer class="footer">
<div class="row-fluid">
<div class="span2">
<h5>Your Account</h5>
<a href="#">YOUR ACCOUNT</a><br>
<a href="#">PERSONAL INFORMATION</a><br>
<a href="#">ADDRESSES</a><br>
<a href="#">DISCOUNT</a><br>
<a href="#">ORDER HISTORY</a><br>
 </div>
<div class="span2">
<h5>Iinformation</h5>
<a href="contact.html">CONTACT</a><br>
<a href="#">SITEMAP</a><br>
<a href="#">LEGAL NOTICE</a><br>
<a href="#">TERMS AND CONDITIONS</a><br>
<a href="#">ABOUT US</a><br>
 </div>
<div class="span2">
<h5>Our Offer</h5>
<a href="#">NEW PRODUCTS</a> <br>
<a href="#">TOP SELLERS</a><br>
<a href="#">SPECIALS</a><br>
<a href="#">MANUFACTURERS</a><br>
<a href="#">SUPPLIERS</a> <br/>
 </div>
 <div class="span6">
<h5>The standard chunk of Lorem</h5>
The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for
 those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et 
 Malorum" by Cicero are also reproduced in their exact original form, 
accompanied by English versions from the 1914 translation by H. Rackham.
 </div>
 </div>
</footer>
</div><!-- /container -->

<div class="copyright">
<div class="container">
	<p class="pull-right">
		<a href="#"><img src="{{url('/')}}/assets/front/img/maestro.png" alt="payment"></a>
		<a href="#"><img src="{{url('/')}}/assets/front/img/mc.png" alt="payment"></a>
		<a href="#"><img src="{{url('/')}}/assets/front/img/pp.png" alt="payment"></a>
		<a href="#"><img src="{{url('/')}}/assets/front/img/visa.png" alt="payment"></a>
		<a href="#"><img src="{{url('/')}}/assets/front/img/disc.png" alt="payment"></a>
	</p>
	<span>Copyright &copy; 2013<br> bootstrap ecommerce shopping template</span>
</div>
</div>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{url('/')}}/assets/front/js/jquery.js"></script>
	<script src="{{url('/')}}/assets/front/js/bootstrap.min.js"></script>
	<script src="{{url('/')}}/assets/front/js/jquery.easing-1.3.min.js"></script>
    <script src="{{url('/')}}/assets/front/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="{{url('/')}}/assets/front/js/shop.js"></script>
  </body>
</html>