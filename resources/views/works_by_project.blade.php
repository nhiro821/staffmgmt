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
		<!-- <div class="container mt-2 border pt-3 pb-3"> -->
		<div class="contai pl-3 mt-2 border pt-3 pb-2 bg-dark text-white">

			<div class="row">
				<div class="col-4">
					<h5>案件名：{{$project->project_name}}
					</h5>
				</div>
				<div class="col-4">

					<h6>手配進捗{{count($project->works->where('arrangement_status', 2))}} / {{ count($project->works) }}人</h6>

				</div>
			</div>
		</div>

		<div class="contai mt-2 ">


			@foreach ($project->works as $work)
			<div class="row">
				<div class="col-1">
					{{$work->working_date}}
				</div>
				<div class="col-1">
					{{$work->staff->staff_name}}
				</div>

				<div class="col-2">
					{{$work->staff->staff_mobilephone}}
				</div>
				<div class="col-1">
					{{(config('const.order_type'))[$work->order_type]}}
					<!-- {{$work->order_type}} -->
				</div>

				<div class="col-1"><select class="edit-select" data-field="arrangement_status" data-id="{{ $work->id }}">
						@foreach (config('const.arrangement_status_1') as $key => $value)
						<option value="{{ $key }}" {{ $work->arrangement_status == $key ? 'selected' : '' }}>
							{{ $value }}
						</option>
						@endforeach
					</select>
				</div>
				<div class="col-4">
					<!-- テキストエリアにメモを表示 -->
					<textarea class="aaa" data-comment="{{ $work->id }}" name="memo" rows="2" cols="50">{{$work->memo}}</textarea>
				</div>
				<div class="col-1">
					<br>
					<button type="button" class="btn btn-primary btn-sm update-comment" data-commentid="{{ $work->id }}">ｺﾒﾝﾄ更新</button>



				</div>
			</div>
			@endforeach

		</div>


		<!-- <p>{{ $work->projectget->project_name }}</p> -->

		@endforeach

		<script type="text/javascript">
			$(document).ready(function() {
				$('.edit-select').change(function() {
					var arrangement_status = $(this).val();
					var selectId = $(this).data('id');

					// console.log('Selected value for id ' + selectId);
					$.ajax({
						url: '/staffmgmt/public/updateStatus ', // Laravel route, you may need to adjust this
						type: 'POST',
						data: {
							'data_id': selectId,
							'arrangement_status': arrangement_status,
							// 'arrangement_status': selectedValue,
							'_token': $('meta[name="csrf-token"]').attr('content') // CSRF token
						},
						success: function(response) {
							//数秒表示されて消えるメッセージ


							//pageをリロード
							location.reload();
						},
						// error: function(error) {
						// 	console.log('An error occurred: ' + error);
						// }
						error: function(xhr, status, error) {
							console.log('An error occurred: ', xhr.responseJSON);
						}
					});
				});
			});
			$(document).ready(function() {
				$('.update-comment').click(function() {
					var commentId = $(this).data('commentid');
					// var newComment = $(this)('textarea[name=memo]').val();
					//comentidを元に、テキストエリアの値を取得
					var newComment = $('textarea[data-comment=' + commentId + ']').val();
					// alert(commentId);
					// alert(newComment);
					$.ajax({
						url: '/staffmgmt/public/updateMemo ',
						type: 'POST',
						data: {
							data_id: commentId,
							new_comment: newComment,
							_token: '{{ csrf_token() }}'
						},
						success: function(response) {
							alert('newComment');
						},
						error: function(xhr) {
							// エラーが発生したときの処理をここに書く
						}
					});
				});
			});
		</script>

	</div>

	<div class="column footer">
		<!-- フッターのコンテンツをここに配置 -->
		<div class="container">
			<div class="row mt-2 border pt-3 pb-2 bg-dark text-white">
				<div class="col-8 ">
					<h4>未手配{{$count_non_arrange}}人/ 全体手配必要人数{{$count_all}}人　</h4>
				</div>
			</div>
		</div>
	</div>
</body>

</html>





@endsection
