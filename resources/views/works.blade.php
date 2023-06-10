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
			<h2><i class="fas fa-search"></i> 手配状況一覧</h2>
		</div>

		<div class="column main">

			@foreach ($works as $works)
			<div class="row border">
				<div class="col">
					<label class="mr-4 ">作業日</label>{{ $works->working_date }}
				</div>
				<div class="col">
					<label class="mr-4 ">作業者</label> {{ $works->staff->staff_name }}
				</div>

				<div class="col">

					<label class="mr-4 ">案件名</label>{{ ($works->projectget)->project_name }}

				</div>
				<div class="col">

					<label class="mr-4">請負先</label>{{ $works->projectget->custmeron->name }}

				</div>
				<div class="col">
					<label class="mr-4">手配状況</label>
					{{ config("const.arrangement_status_1.$works->arrangement_status") }}

				</div>
				<div class="col">
					<label class="mr-4">依頼区分</label>{{ config("const.order_type.$works->order_type") }}

				</div>
				<div class="row">
					<div class="col-6">
						<label class="mr-4">作業場所</label>{{ $works->work_prefecture }}{{ $works->work_address }}
					</div>
					<div class="col-3">
						<label class="mr-4">作業開始予定時間</label>{{ $works->working_start_plan_time }}
					</div>
					<div class="col-3">
						<label class="mr-4">作業終了予定時間</label>{{ $works->working_end_plan_time }}
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="mr-4">報酬</label>{{ $works->reward }}
					</div>
				</div>

				<div class="row">


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
