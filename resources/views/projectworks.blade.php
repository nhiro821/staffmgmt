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
			<!-- <h2><i class="fas fa-search"></i> 案件別手配状況</h2>
		</div> -->
			<div class="light-padding">
				<input type="text" name="projectname" value="{{ $project->project_name}}">
			</div>
			<div>

			</div>


</body>

</html>





@endsection
