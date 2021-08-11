<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="{{asset('shop/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('shop/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('shop/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('shop/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('shop/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('shop/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('shop/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('sweetalert/css/sweetalert.css')}}" rel="stylesheet">
	{{-- Slide - show --}}

    <link rel="stylesheet" href="{{asset('slideshow/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('slideshow/css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('slideshow/css/animate.css')}}">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="{{asset('slideshow/css/bootstrap.min.css')}}"> --}}
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('slideshow/css/style.css')}}">
	{{-- End --}}
    <link rel="shortcut icon" href="{{asset('shop/images/logo/logo1.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 981 799 175</a></li>
								<li><a href="https://mail.google.com/mail/u/0/#inbox"><i class="fa fa-envelope"></i> phucnh2307@gmail.com</a></li>
							</ul>
						</div>
					</div>
					
					@if(Session('customer_name'))
						<div class="col-sm-5">
							<div class="social-icons pull-right">
								<ul class="nav navbar-nav">
									<li><a href="https://www.facebook.com/profile.php?id=100034829753466"><i class="fa fa-facebook"></i></a></li>
									{{-- <li><a href="#"><i class="fa fa-twitter"></i></a></li> --}}
									<li><a href="https://github.com/pkucnh"><i class="fa fa-github"></i></a></li>
									{{-- <li><a href="#"><i class="fa fa-dribbble"></i></a></li> --}}
									<li><a href="https://mail.google.com/mail/u/0/#inbox"><i class="fa fa-envelope"></i></a></li> 
								</ul>
							</div>
						</div>
						<div class="col-sm-1">
							<div class="contactinfo">
								<ul class="nav nav-pills">
									<li><a href="" style="h"><i class="fa fa-user"></i> {{Session('customer_name')}}</a></li>
								</ul>
							</div>
						</div>
					@else
						<div class="col-sm-6">
							<div class="social-icons pull-right">
								<ul class="nav navbar-nav">
									<li><a href="https://www.facebook.com/profile.php?id=100034829753466"><i class="fa fa-facebook"></i></a></li>
									{{-- <li><a href="#"><i class="fa fa-twitter"></i></a></li> --}}
									<li><a href="https://github.com/pkucnh"><i class="fa fa-github"></i></a></li>
									{{-- <li><a href="#"><i class="fa fa-dribbble"></i></a></li> --}}
									<li><a href="https://mail.google.com/mail/u/0/#inbox"><i class="fa fa-envelope"></i></a></li> 
								</ul>
							</div>
						</div>
					@endif

				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-bottom bg-header"><!--header-bottom-->
			<div class="container">
				<div class="row">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left col-sm-12">
							<ul class="nav navbar-nav collapse navbar-collapse ">
								<li><img src="{{asset('shop/images/logo/logo1.png')}}" class="logo"></li>
								<li><a href="{{url('/')}}" class="active not">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Danh mục<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<li><a href="{{url('bycategory')}}/{}/0">Tất cả sản phẩm</a></li> 		
										@if(Session::get('customer_id')!=NULL)
											<li><a href="{{url('/history')}}">Lịch sử đặt hàng</a></li> 
										@endif					
										<li><a href="{{asset('/cart')}}">Giỏ hàng</a></li> 
                                    </ul>
                                </li> 
								<li><a href="{{url('bycategory')}}/{}/0">Sản phẩm</a></li>
								<li><a href="{{url('lien-he')}}">Liên hệ</a></li>
							</ul>

							<ul class="nav navbar-nav tai float-right">
								<li><a class="a" href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
								@if(Session('customer_name'))
								{{-- <li>
									<a href="#">{{Session('customer_name')}}
										<i class="fa fa-user" aria-hidden="true"></i>
									</a>
								</li> --}}
								<li>
									<a class="aa" href="{{asset('dang-xuat')}}">
										<i class="fa fa-sign-out" aria-hidden="true"></i>
									</a>
								</li>
								@else							
								<li><a class="aa" href="{{url('dang-nhap')}}"><i class="fa fa-user"></i></a></li>
								@endif
							</ul>
						</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	