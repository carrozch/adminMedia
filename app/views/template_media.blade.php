<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>
			Admin Media
		</title>
		<link href="{{ URL::asset('favicon.ico')}}" rel="shortcut icon">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{{ HTML::style('assets/css/bootstrap.min.css') }}
		{{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
		{{ HTML::style('assets/css/main.css') }}
		{{ HTML::style('http://fonts.googleapis.com/css?family=Imprima') }}
	</head>

	<body>
		<div class="container">

			<header class="row">
				<div id="entete" class="span12">
					<h1>
						SPOOTNIK.COM®
					</h1>
					@if (Auth::check())
						{{ $user->username }} {{ isset($media) ? 'from '.$media->name : '' }}
					@endif
				</div>
			</header>

			<nav class="navbar">
				<div class="navbar-inner">
					<ul class="nav">
						@yield('navigation')
					</ul>
				</div>
			</nav>
			
			<section>
				@yield('content')
			</section>
			

			<footer class="row">

			</footer>

		</div>
	</body>
</html>