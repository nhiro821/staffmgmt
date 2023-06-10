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
		<h3 class="text-center my-3">{{ \Carbon\Carbon::parse($dates[0])->format('Y年m月') }}</h3>
		@php
		$weekDays = ['(月)', '(火)', '(水)', '(木)', '(金)', '(土)', '(日)'];
		$weekMap = [0, 1, 2, 3, 4, 5, 6];
		@endphp
		<div class="row border mt-2 text-center align-items-center">
			@foreach ($weekDays as $weekDay)
			<div class="col" style="height:80px">
				<p class="mb-0">{{ $weekDay }}</p>
			</div>
			@endforeach
		</div>
		<div class="row border mt-2 text-center align-items-center">
			@php
			$firstDateCarbon = \Carbon\Carbon::parse($dates[0]);
			$firstDayOfWeek = $weekMap[$firstDateCarbon->dayOfWeek];
			@endphp
			@for ($i = 0; $i < $firstDayOfWeek; $i++) <div class="col" style="height:80px">
		</div>
		@endfor
		@foreach ($dates as $date)
		@php
		$dateCarbon = \Carbon\Carbon::parse($date);
		$dayOfWeek = $weekMap[$dateCarbon->dayOfWeek];
		@endphp
		@if($dayOfWeek == 0 && !$loop->first)
		@for ($i = $dayOfWeek; $i < 7; $i++) <div class="col" style="height:80px">
	</div>
	@endfor
	</div>
	<div class="row border mt-2 text-center align-items-center">
		@endif
		<div class="col" style="height:80px">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="dateCheck{{ $loop->iteration }}">
				<label class="form-check-label d-block" for="dateCheck{{ $loop->iteration }}">
					{{ $dateCarbon->day }}
				</label>
			</div>
		</div>
		@if($loop->last)
		@for ($i = $dayOfWeek + 1; $i < 7; $i++) <div class="col" style="height:80px">
	</div>
	@endfor
	@endif
	@endforeach
	</div>
	</div>

	</div>

	</div>



	</div>
	</div>
</body>

</html>





@endsection
