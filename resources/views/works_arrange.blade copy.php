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
	<!-- CSS や他のヘッダー情報aaaをここに追加 -->
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
			<h2><i class="fas fa-search"></i> 未手配一覧</h2>
		</div>

		<div>
			<!-- 検索フォーム -->
			<!-- <div class="mb-2"> -->
			<form action="{{ route('works.index2') }}" method="GET" id="SearchForm">
				<div class="" style="display: flex; width:300px;">
					<input type=" text" class="form-control" name="kensaku" value="{{$search}}" placeholder="キーワードを入力">
					<input type="submit" class="btn btn-primary" value="検索">
				</div>
			</form>
			<br></br>
		</div>

		<table class="table">
			<tr>
				<th>
					作業日
				</th>
				<th>
					作業者
				</th>
				<th>
					案件名
				</th>
				<th>手配状況</th>

			</tr>

			@foreach ($works as $works)
			<tr>
				<td>
					{{ $works->working_date }}
				</td>
				<td>
					{{ $works->staff->staff_name }}
				</td>
				<td>
					{{ ($works->projectget)->project_name }}
				</td>
				<td>{{ config("const.arrangement_status_1.$works->arrangement_status") }}</td>
			</tr>
			@endforeach
		</table>
	</div>

	<div class="column footer">
		<!-- フッターのコンテンツをここに配置 -->
		<!-- 案件名ごとに作業をリスト表示-->
		<!-- 複数の案件をまとめる-->
		@php
		$displayedTypes = []; // 一時的な配列を初期化
		@endphp

		@foreach($works as $works)
		<ul>
			<li>
				{{ ($works->projectget)->project_name }}
			</li>
		</ul>
		@endforeach

	</div>
	</div>
</body>

</html>





@endsection
