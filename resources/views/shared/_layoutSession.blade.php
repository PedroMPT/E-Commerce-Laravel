<!DOCTYPE html>
<html>
<head>
	<title>Forte & Grosso</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css">
			<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
	<link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
	{{--<link rel="stylesheet" href="{{asset('css/app.css')}}"/>--}}
	<link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
@include('shared._navLayout')
<div class="container">
		@yield('content')
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
@yield('scripts')
</body>
</html>
