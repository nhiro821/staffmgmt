<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<style>
		/* 各列のスタイル */
		.column {
			flex: 1;
			/* 幅を均等にするための設定 */
			padding: 20px;
		}

		/* ヘッダーのスタイル */
		.header {
			background-color: #f2f2f2;
		}

		/* メインコンテンツのスタイル */
		.main {
			background-color: #ffffff;
		}

		/* フッターのスタイル */
		.footer {
			background-color: #ffffff;
			padding: 20px;
		}

		.navbar-nav li a {
			display: inline-block;
			padding: 10px;
			text-decoration: none;
		}

		.navbar-nav li a:hover {
			background-color: #f2f2f2;
			color: #ff0000;
		}

		.foot {}
	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#edit').change(function() {
				alert('The arrangement_status has been changed to: ' + $(this).val());
			});
		});
	</script>
</head>

<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>


				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav me-auto">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('custmers.index') }}">取引先一覧</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="worksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								作業一覧
							</a>
							<ul class="dropdown-menu" aria-labelledby="worksDropdown">
								<li><a class="dropdown-item" href="{{ route('works.index') }}">手配状況一覧</a></li>
								<li><a class="dropdown-item" href="{{ route('works.index2') }}">未手配一覧</a></li>
								<li><a class="dropdown-item" href="{{ route('works.by_project') }}">案件別手配状況</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('staff.index') }}">スタッフ一覧</a>
						</li>
					</ul>


					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ms-auto">
						<!-- Authentication Links -->
						@guest
						@if (Route::has('login'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@endif

						@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
						@endif
						@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }}
							</a>

							<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</div>
						</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		<main class="py-4">
			@yield('content')
		</main>
	</div>
</body>

</html>
