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

			@foreach ($projects as $project)
			<div class="card">
				<div class="worker">
					<label>案件名</label> {{ $project->project_name }}
				</div>

				<div class="custmer">

					<label>作業概要</label>{{$project->project_gaiyo }}

				</div>

				<div class="custmer">

					<label>受注金額</label>{{$project->order_amount }}

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
