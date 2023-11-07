<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>@yield('title')</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="/weather/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Add Bootstrap CSS and JavaScript -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

		<!-- Loading main css file -->
		<link rel="stylesheet" href="{{ asset('/weather/style.css') }}">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>

		<div class="site-content">
			<div class="site-header">
				<div class="container">
					<a href="{{ route('home') }}" class="branding">
						<img src="{{ asset('/weather/images/logo.png') }}" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">Cloud Movie</h1>
							<small class="site-description">nonton in everywhere</small>
						</div>
					</a>

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item {{ request()->is('/') ? 'current-menu-item' : '' }}"><a href="{{ route('home') }}" >Beranda</a></li>
							<li class="menu-item {{ request()->is('category') ? 'current-menu-item' : '' }}"><a href="{{ route('category') }}" >Kategori</a></li>
							<li class="menu-item {{ request()->is('genre') ? 'current-menu-item' : '' }}"><a href="{{ route('genre') }}" >Genre</a></li>
							<li class="menu-item {{ request()->is('contact') ? 'current-menu-item' : '' }}"><a href="{{ route('contact') }}">Contact Us</a></li>
							<li class="menu-item {{ request()->is('login') ? 'current-menu-item' : '' }}"><a href="{{ route('login') }}">Login</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</div> <!-- .site-header -->

		
			@yield('content')

			<footer class="site-footer">
				<div class="container">
					<p class="colophon">Copyright 2023 Cloud Movie. All rights reserved</p>
				</div>
			</footer> <!-- .site-footer -->
		</div>
		
		<script src="{{ asset('/weather/js/jquery-1.11.1.min.js') }}"></script>
		<script src="{{ asset('/weather/js/plugins.js') }}"></script>
		<script src="{{ asset('/weather/js/app.js') }}"></script>
		
	</body>

</html>