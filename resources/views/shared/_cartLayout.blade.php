<!DOCTYPE html>
<html>
<head>
	<title>Forte e Grosso</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css">
	<link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
	<link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
	{{--<link rel="stylesheet" href="{{asset('css/app.css')}}"/>--}}
	<link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
	      		</button>
				<a href="/home" class="navbar-brand"><i class="fas fa-dumbbell"></i> Forte & Grosso</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-nav-demo">
				<ul class="nav navbar-nav navbar-right">
					@if(auth()->check())

						<li class="nav-item font-weight-bold"> <a href="#" class="nav-link"> Olá, {{ auth()->user()->name }}</a></li>
						<li class="nav-item"> <a href="/logout" class="nav-link"> Logout </a></li>

						@if(auth()->user()->role == 'admin')
   						<li class="nav-item"><a href="/admin">Gestão de Produtos</a></li>
						@endif

					@else
						<li class="nav-item"><a href="/register">Sign Up</a></li>
						<li class="nav-item"><a href="/login">Login</a></li>
					@endif

						<li class="nav-item">
							<a href="{{route('cart.shoppingCart')}}"><span class="badge text-right"> {{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span><i class="fas fa-shopping-cart"></i> Carrinho de Compras </a>

						</li>

				</ul>
			</div>
		</div>
	</nav>

	<div class="container">


		@yield('content')

	</div>

	<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
	@yield('scripts')
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>


</body>
</html>
