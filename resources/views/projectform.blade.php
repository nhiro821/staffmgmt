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

<style>
	.text-right {
		text-align: right;
	}
</style>
<div class="ml-3">
	<form method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
		@csrf

		<div class="containar">
			<div class="row">
				<div class="col-4 py-3">
					<label>案件名</label>
					<input type="text" class="form-control w-100" name="project_name" value="{{ old('project_name') }}" />
				</div>
				<div class="col-4 py-3">
					<div>
						<label for="custmer">{{ __('取引先') }}</label>
						<div>
							<select class="form-control w-100 select" id="id" name="id">
								@foreach ($custmers as $custmer)
								<option value="{{ $custmer->id }}">{{ $custmer->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Datepicker input field -->
		<div class="containar">
			<div class="row">
				<div class="col-2 py-3">
					<label>プロジェクト開始日</label>
					<div class="w-75">
						<input type="text" class="form-control" id="datepicker" name="project_startday">
					</div>
				</div>
				<div class="col-1 py-2">～</div>
				<div class="col-2 py-2">
					<label>プロジェクト終了日</label>
					<div class="w-75">
						<input type="text" class="form-control" id="datepicker2" name="project_endday">
					</div>
				</div>
				<div class="col-2 py-3">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="checkboxName">
						<label class="form-check-label" for="defaultCheck1">
							受注済み
						</label>
					</div>
				</div>
			</div>
		</div>



		<div>


			<label>受注金額</label>
			<input type="text" class="form-control w-25 text-right" name="project_price" value="{{ number_format(old('project_price'), 0, '', ',') }}" />

			<label>プロジェクト概要</label>
			<div class="form-group">

				<textarea name="project_gaiyo" id="project_gaiyo" cols="50" rows="3"></textarea>

			</div>




			<input class="btn btn-primary mt-3" type="submit" value="送信" />
	</form>

	<div class="py-3">
		<a href="{{ route('project.index') }}" class="btn btn-secondary"> 戻る </a>
	</div>
</div>
@endsection
