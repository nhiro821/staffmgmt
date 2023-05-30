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

			@foreach ($staff as $staff)
			<div class="card">
				<div class="name">
					{{ $staff->staff_name }}
				</div>
				<div class="mobilephone">
					{{ $staff->staff_mobilephone }}
				</div>
				<div class="postcode">
					{{ $staff->staff_postcode }}
				</div>
				<div class="prefecture">
					{{ $staff->staff_prefecture }}{{ $staff->staff_address }}
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
