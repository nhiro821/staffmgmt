@extends('layouts.app')
@section('content')

@if ($errors->any())
<div style="color:red;">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<!DOCTYPE html>
<html>

<head>
	<title>Your Page Title</title>
	<!-- CSS や他のヘッダー情報をここに追加 -->
	<style>
		.name {
			font-weight: bold;
		}
	</style>

</head>

<body>
	<div class="container">
		<div class="column header">
			<!-- ヘッダーのコンテンツをここに配置 -->
		</div>

		<div class="column main">

			@foreach ($custmers as $custmer)
			<div class="card">
				<div class="custom_name">
					{{ $custmer->name }}
				</div>


			</div>
			@endforeach

			<!-- メインコンテンツのコンテンツをここに配置 -->
		</div>

		<div class="column footer">
			<!-- フッターのコンテンツをここに配置 -->
		</div>
	</div>
</body>

</html>





@endsection
