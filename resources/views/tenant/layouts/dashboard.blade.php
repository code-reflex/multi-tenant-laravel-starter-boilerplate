<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name', 'Townhouse') }}</title>
		<!-- Fonts -->
		<link rel="dns-prefetch" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/dashboard.css">
		@yield('css')
	</head>
	<body>
		<div class="app">
			<!-- Sidebar Holder -->
			<nav id="sidebar">
				<div class="sidebar-header">
					<img src="https://dummyimage.com/240x80/0c2447/fff.png&text={{config('app.name', 'Laravel')}}" alt="{{ config('app.name', 'Laravel') }}" width=100% style="padding:20px;">
				</div>
				<ul class="list-unstyled components">
					<li>
						<a href="/home">Home</a>
					</li>
					<hr/>
                    <!-- use a menu section to dynamically pass the menu content by listing the LI items needed in the section  -->
                    <!-- 
                    @hasSection('menu')
                        @yield('menu')
                    @else
                     -->
					<li>
						<a href="/users">Users</a>
					</li>
					<li>'
						<a href="/products">Products</a>
					</li>
					<li>
						<a href="/orders">Orders</a>
					</li>
					<li>
						<a href="/suppliers">Suppliers</a>
					</li>
					<hr/>
					<li>
						<a href="/reports">Reports</a>
					</li>
                    <!-- @endif -->
				</ul>
			</nav>
			<!-- Page Content Holder -->
			<div id="content">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="container-fluid">
						<button type="button" id="sidebarCollapse" class="navbar-btn">
						<span></span>
						<span></span>
						<span></span>
						</button>
						<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fa fa-align-justify"></i>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="nav navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="#"><i class="fa fa-envelope"></i></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#"><i class="fa fa-bell"></i></a>
								</li>
								@guest
								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
								</li>
								@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
								@endif
								@else
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }}
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	                                    <a class="dropdown-item" href="{{ route('profile') }}">{{ __('Profile') }}</a>
										<a class="dropdown-item" href="{{ route('logout') }}"
											onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</div>
								</li>
								@endguest
							</ul>
						</div>
					</div>
				</nav>
				<div class="container">
					@yield("content")
				</div>
				<div class="container" style="padding-top: 10px;">
					@if (session('alert'))
					<div class="{{ "alert alert-" . session('alert')['type']}}" role="alert">
					{{ session('alert')['message'] }}
				</div>
				@endif
			</div>
		</div>
		</div>
	</body>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		    $('#sidebarCollapse').on('click', function () {
		        $('#sidebar').toggleClass('active');
		        $(this).toggleClass('active');
		    });
		});
	</script>
	@yield('js')
</html>