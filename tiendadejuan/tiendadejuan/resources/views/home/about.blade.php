@extends('layout.app')
@section('title', $array["title"])
@section('subtitle', $array["subtitle"])
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-4 ms-auto">
				<p class="lead">{{ $array["description"] }}</p>
			</div>
			<div class="col-lg-4 me-auto">
				<p class="lead">{{ $array["author"] }}</p>
			</div>
		</div>
	</div>
@endsection