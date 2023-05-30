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
			<h2><i class="fas fa-search"></i> 案件別手配状況</h2>
		</div>
		<div class="light-padding">
			<h4>未手配人数合計{{$count}}人</h4>
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

		@foreach ($projects as $project)
		<!-- アイテムを表示 -->

		<!-- <div class="footer"> -->
		<div class="container">
			<div class="title1">
				<h5>案件名：{{$project->project_name}}</h5>
				<div>未手配人数{{ count($project->works) }}人</div>

			</div>
			<div class="row">
				@foreach ($project->works as $work)
				<div class="col-2">
					{{$work->staff->staff_name}}
				</div>
				<div class="col-4"><select id="edit" data-field="arrangement_status" data-id="{{ $work->id }}">
						@foreach (config('const.arrangement_status_1') as $key => $value)
						<option value="{{ $key }}" {{ $work->arrangement_status == $key ? 'selected' : '' }}>
							{{ $value }}
						</option>
						@endforeach
					</select></div>
				@endforeach


			</div>
		</div>


		<!-- <p>{{ $work->projectget->project_name }}</p> -->

		@endforeach



	</div>

	<div class="column footer">
		<!-- フッターのコンテンツをここに配置 -->



	</div>
</body>

</html>





@endsection
