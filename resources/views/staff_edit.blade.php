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

		<form action="{{ route('staff.update_day', ['id' => $staff->id])}}" method="POST">
			@csrf <!-- CSRF保護トークンの埋め込み -->
			<div class="column main">

				<div class="ml-3">

					<div>
						<div class="name">
							<label for="">氏名</label>{{ $staff->staff_name }}
						</div>
						<div class="phone">
							<label for="">電話番号</label>{{ $staff->staff_mobilephone }}
						</div>
						<div class="phone">
							<label for="">最寄り駅</label>{{ $staff->home_closest_station }}
						</div>
					</div>


					<!-- メインコンテンツのコンテンツをここに配置 -->
				</div>

				<div class="column footer">
					<!-- フッターのコンテンツをここに配置 -->
					<h3>作業可能日</h3>
					<div class="container">


						<div class="text-center">
							<h2>{{$thismonth}}月</h2>
						</div>
						<div class="row border mt-2">
							<div class="col mt-2">
								(月)</div>
							<div class="col mt-2">
								(火)</div>
							<div class="col mt-2">
								(水)</div>
							<div class="col mt-2">
								(木)</div>
							<div class="col mt-2">
								(金)</div>
							<div class="col mt-2">
								(土)</div>
							<div class="col mt-2">
								(日)</div>
						</div>
						<div class="row border mt-2">
							@php
							$firstDateCarbon = \Carbon\Carbon::parse($dates[0]);
							$firstDayOfWeek = $firstDateCarbon->dayOfWeek;

							@endphp

							<!-- もし$firstDayOfWeekが0以上の場合 -->
							@if($firstDayOfWeek > 0)
							@for ($i = 0; $i < $firstDayOfWeek-1; $i++) <div class="col">
								<div class="form-check">
									<label class="form-check-label">
									</label>
								</div>
						</div>
						@endfor
						@endif

						@foreach ($dates as $date)
						<!-- dateは2023-06-01 -->
						<!-- Carbon オブジェクトを使用して、日付の操作や書式設定などを簡単に行う-->
						<!-- dayweekで日付の曜日を取得する -->
						@php
						$dateCarbon = \Carbon\Carbon::parse($date);
						$dayOfWeek = $weekMap[$dateCarbon->dayOfWeek];
						@endphp
						@if($dayOfWeek == 1 && !$loop->first)

					</div>
					<div class="row border mt-2">
						@endif

						@php
						$checked = in_array($date,$available_dates->pluck('date')->toArray()) ? 'checked' : '';
						@endphp
						<div class="col">
							<div class="form-check">

								<input class="form-check-input" input type="checkbox" name="dates[]" value="{{ $date }}" id="dateCheck{{ $loop->iteration }}" {{$checked}}>
								<label class="form-check-label" for="dateCheck{{ $loop->iteration }}">
									{{ $date }}
								</label>
							</div>
						</div>

						<!-- もし日曜日じゃなくてループの最終だったら -->
						@if($dayOfWeek != 0 && $loop->last)
						<!-- 日曜日になるまでdivを生成する -->

						@for($i = $dayOfWeek; $i < 7; $i++) <div class="col">

					</div>
					@endfor @endif @endforeach
				</div>

				<div class="col mt-2">
					<input type="submit" value="可能日更新"> <!-- Submitボタンの追加 -->
				</div>

			</div>
			<div class="container">

				<div class="text-center">
					<h2>{{$nextmonth}}月</h2>
				</div>
				<div class="row border mt-2">
					<div class="col mt-2">
						(月)</div>
					<div class="col mt-2">
						(火)</div>
					<div class="col mt-2">
						(水)</div>
					<div class="col mt-2">
						(木)</div>
					<div class="col mt-2">
						(金)</div>
					<div class="col mt-2">
						(土)</div>
					<div class="col mt-2">
						(日)</div>
				</div>
				<div class="row border mt-2">
					@php
					$firstDateCarbon = \Carbon\Carbon::parse($nextdates[0]);


					$nextfirstDayOfWeek = $firstDateCarbon->dayOfWeek;

					@endphp

					@for ($i = 0; $i < $nextfirstDayOfWeek-1; $i++) <div class="col">
						<div class="form-check">
							<label class="form-check-label">

							</label>
						</div>
				</div>
				@endfor
				@foreach ($nextdates as $nextdate)
				<!-- dateは2023-06-01 -->
				<!-- Carbon オブジェクトを使用して、日付の操作や書式設定などを簡単に行う-->
				<!-- dayweekで日付の曜日を取得する -->
				@php
				$dateCarbon = \Carbon\Carbon::parse($nextdate);
				$nextdayOfWeek = $dateCarbon->dayOfWeek;

				$dateString = \Carbon\Carbon::parse($nextdate)->format('Ymd');
				@endphp
				@if($nextdayOfWeek == 1 && !$loop->first)

			</div>

			<div class="row border mt-2">
				@endif

				<div class="col">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="dates[]" value="{{ $nextdate }}" id="dateCheck{{ $dateString }}{{ $loop->iteration }}">
						<label class="form-check-label" for="dateCheck{{ $dateString }}{{ $loop->iteration }}">

							{{ $nextdate }}
						</label>
					</div>
				</div>

				<!-- もし日曜日じゃなくてループの最終だったら -->
				@if($nextdayOfWeek != 0 && $loop->last)
				<!-- 日曜日になるまでdivを生成する -->
				@for($i = $nextdayOfWeek; $i < 7; $i++) <div class="col">

			</div>
			@endfor @endif @endforeach
	</div>
	<div class="col mt-2">
		<input type="submit" value="可能日更新"> <!-- Submitボタンの追加 -->
	</div>
	</form>
	</div>

	</div>
	</div>
</body>

</html>





@endsection
