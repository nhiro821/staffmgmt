<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

	<link rel="icon" href="{{ asset('public/logo.png') }}">
	<title>{{ config('app.name', 'キャンディルテクト') }}</title>


	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- font-awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

	<!-- Select2.css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
	<!-- Select2本体 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

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
			padding: 2px 5px;
			/* 縦幅のpaddingを減らして縦幅を小さくします */
			text-decoration: none;
			font-size: 18px;
			/* テキストのサイズを大きくします */
		}

		.navbar-nav li a:hover {
			background-color: #d9d9d9;
			/* hover時の背景色を濃くします */
			color: #ff0000;
		}

		//	navbarのプルダウンも同様なスタイルにします
		.navbar-nav .dropdown-menu li a {
			padding: 5px 10px;
			font-size: 18px;
		}

		.foot {
			background-color: #f2f2f2;
			/* フッターの背景色 */
			color: #333;
			/* フッター内のテキスト色 */
			padding: 20px;
			/* フッター内の余白 */
			text-align: center;
			/* テキストを中央寄せにする */
			font-size: 0.9em;
			/* フッター内の文字サイズ */
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#edit').change(function() {
				alert('The arrangement_status has been changed to: ' + $(this).val());
			});
		});
		$(function() {
			$("#datepicker").datepicker({
				dateFormat: "yy-mm-dd"
			});
		});

		$(function() {
			$("#datepicker2").datepicker({
				dateFormat: "yy-mm-dd"
			});
		});

		$(document).ready(function() {
			$('.select').select2();
		});
	</script>




</head>

<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

			<div class="navbar-header" style="margin-top:8px;margin-right: 8px;">
				<a class="" href="https://candeal-tect.co.jp/index.html" target="_blank">
					<img src="{{ asset('storage/logo.png') }}" alt="logo">
				</a>
			</div>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Left Side Of Navbar -->
				<ul class="navbar-nav me-auto">
					<!-- <li class="nav-item">
							<a class="nav-link" href="{{ route('custmers.index') }}">取引先</a>
						</li> -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="worksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							取引先
						</a>
						<ul class="dropdown-menu" aria-labelledby="worksDropdown">
							<li><a class="dropdown-item" href="{{ route('custmers.index') }}">取引先登録</a></li>
							<li><a class="dropdown-item" href="{{ route('custmers.index') }}">取引先一覧</a></li>
							<li><a class="dropdown-item" href="{{ route('custmers.index') }}">最近登録した取引先</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="worksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							案　件
						</a>
						<ul class="dropdown-menu" aria-labelledby="worksDropdown">
							<li><a class="dropdown-item" href="{{ route('project.create') }}">案件登録</a></li>
							<li><a class="dropdown-item" href="{{ route('project.index') }}">案件一覧</a></li>
							<li><a class="dropdown-item" href="{{ route('project.index') }}">未受注案件</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="worksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							作　業
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
		</nav>

		<main class="py-4">
			@yield('content')
		</main>
	</div>
</body>

</html>
