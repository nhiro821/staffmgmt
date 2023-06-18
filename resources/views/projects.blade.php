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

		.row {
			display: flex;
		}

		.myLabel {
			width: 200px;
			display: inline-block;
			/* border: 1px solid black; */
			background-color: #e6e6e6;
			text-align: center;
			padding: 0;
			margin: 0;
		}

		.date {
			width: 170px;
			text-align: center;
		}

		.money {
			width: 200px;
			text-align: right;
		}

		.project_name {
			width: 300px;
			text-align: left;
		}

		.gaiyo {
			text-align: left;
		}

		.gaiyo-input {
			width: 900px;

			text-align: left;
		}

		.myContent {

			border: 1px solid black;
			display: flex;
			/* justify-content: space-between; */
			/* 要素間にスペースを開ける */
			flex-wrap: wrap;
			/* 要素が行をはみ出すことなく折り返す */
		}

		.myContent:first-child {
			border-bottom: none;
		}

		.wakuwaku {
			padding-bottom: 5px;
			margin-bottom: 5px;
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
			<div class="wakuwaku">
				<form action="{{ route('project.workedit', ['id' => $project->id])}}" method="POST">
					@csrf <!-- CSRF保護トークンの埋め込み -->
					<div class="myContent">
						<label class="myLabel" for="name">案件名</label>
						<div class="project_name">{{ $project->project_name }}</div>
						<label class="myLabel">プロジェクト開始日</label>
						<div class="date">{{ $project->project_startday }}</div>
						<label class="myLabel">プロジェクト終了日</label>
						<div class="date"> {{ $project->project_endday }}</div>
					</div>

					<div class="myContent">
						<label class="myLabel" for="order_amount">受注金額</label>
						<div class="money">{{ $project->order_amount}}</div>
						<label class="myLabel" for="base_number">拠点数</label>
						<div class="date">{{$project->base_number }}
							<!-- $project->base_numberの値があれば表示 -->
							@if ($project->base_number)拠点 @endif</div>
						<label class="myLabel" for="required_count">必要人数</label>

						<div class="date">{{$project->required_count}}人</div>
					</div>
					<div class="myContent gaiyo">
						<label class="myLabel" for="gaiyo">作業概要</label>
						<div class="gaiyo-input">{{ $project->project_gaiyo }}</div>

						<div> <input type="submit" value="手配リスト追加"> <!-- Submitボタンの追加 --></div>
					</div>
				</form>


			</div>
			@endforeach

		</div>


		<!-- メインコンテンツのコンテンツをここに配置 -->
	</div>

	<div class="column footer">
		<!-- フッターのコンテンツをここに配置 -->
	</div>

</body>

</html>





@endsection
