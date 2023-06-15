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
						{{ $staff->staff_name }}
					</div>
					@foreach ($available_dates as $available_date)
					<div>
						{{ $available_date->date }}
					</div>
					@endforeach


					<!-- メインコンテンツのコンテンツをここに配置 -->
				</div>

				<div class="column footer">
					<!-- フッターのコンテンツをここに配置 -->
					<div class="container">
						作業可能日
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
							$firstDayOfWeek = $weekMap[$firstDateCarbon->dayOfWeek];
							@endphp
							@for ($i = 0; $i < $firstDayOfWeek; $i++) <div class="col">
								<div class="form-check">
									<label class="form-check-label">
										<!-- {{ $weekDays[$i] }}: -->
									</label>
								</div>
						</div>
						@endfor

						@foreach ($dates as $date)
						@php
						$dateCarbon = \Carbon\Carbon::parse($date);
						$dayOfWeek = $weekMap[$dateCarbon->dayOfWeek];
						$checked = checked;
						@endphp
						@if($dayOfWeek == 0 && !$loop->first)

					</div>
					<div class="row border mt-2">
						@endif


						<div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="dateCheck{{ $loop->iteration }}">
								<label class="form-check-label" for="dateCheck{{ $loop->iteration }}">
									<!-- {{ $weekDays[$dayOfWeek] }}: {{ $date }} -->
									{{ $date }}
								</label>
							</div>
						</div>

						<!-- もし日曜日じゃなくてループの最終だったら -->
						@if($dayOfWeek != 6 && $loop->last)
						<!-- 日曜日になるまでdivを生成する -->
						@for($i = $dayOfWeek; $i < 6; $i++) <div class="col">

					</div>
					@endfor @endif @endforeach
				</div>
				<input type="submit" value="Submit"> <!-- Submitボタンの追加 -->
		</form>
	</div>
	<div class="container">
		@php
		$weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
		$weekMap = [0, 1, 2, 3, 4, 5, 6];
		@endphp
		<div class="row border mt-2">
			@php
			$firstDateCarbon = \Carbon\Carbon::parse($dates[0]);

			$firstDayOfWeek = $weekMap[$firstDateCarbon->dayOfWeek];
			@endphp

			@for ($i = 0; $i < $firstDayOfWeek; $i++) <div class="col">
				<div class="form-check">
					<label class="form-check-label">
						<!-- {{ $weekDays[$i] }}: -->
					</label>
				</div>
		</div>
		@endfor
		@foreach ($dates as $date)
		@php
		$dateCarbon = \Carbon\Carbon::parse($date);
		$dayOfWeek = $weekMap[$dateCarbon->dayOfWeek];
		@endphp
		@if($dayOfWeek == 0 && !$loop->first)
	</div>

	<div class="row border mt-2">
		@endif

		<div class="col">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="dateCheck{{ $loop->iteration }}">
				<label class="form-check-label" for="dateCheck{{ $loop->iteration }}">
					<!-- {{ $weekDays[$dayOfWeek] }}: {{ $date }} -->
					{{ $date }}
				</label>
			</div>
		</div>

		<!-- もし日曜日じゃなくてループの最終だったら -->
		@if($dayOfWeek != 6 && $loop->last)
		<!-- 日曜日になるまでdivを生成する -->
		@for($i = $dayOfWeek; $i < 6; $i++) <div class="col">

	</div>
	@endfor @endif @endforeach
	</div>
	</div>

	</div>
	</div>
</body>

</html>





@endsection
