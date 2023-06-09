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
			<h2><i class="fas fa-search"></i> 未手配一覧</h2>
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

		<table class="table">
			<tr>
				<th>作業日</th>
				<th>作業者</th>
				<th>案件名</th>
				<th>手配状況</th>
			</tr>

			@foreach ($works as $work)
			<tr data-id="{{ $work->id }}">
				<td>{{ $work->working_date }}</td>
				<td>{{ $work->staff->staff_name }}</td>
				<td>
					{{ optional($work->projectget)->project_name }}
				</td>
				<td>
					<select class="edit-select" data-field="arrangement_status" data-id="{{ $work->id }}">
						@foreach (config('const.arrangement_status_1') as $key => $value)
						<option value="{{ $key }}" {{ $work->arrangement_status == $key ? 'selected' : '' }}>
							{{ $value }}
						</option>
						@endforeach
					</select>





					<!-- <select class="form-control w-25 select" id="torihikisaki" name="torihikisaki_id">
						@foreach (config('const.arrangement_status_1') as $arrangement_status)
						<option value="">{{ $arrangement_status }}</option>
						@endforeach
					</select> -->
				</td>

			</tr>
			@endforeach
		</table>

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
							// alert(arrangement_status)
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
		</script>



	</div>

	<div class="column footer">
		<!-- フッターのコンテンツをここに配置 -->


		<!-- アイテムを表示 -->


	</div>
</body>

</html>





@endsection
