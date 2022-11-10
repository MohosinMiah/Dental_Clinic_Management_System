@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h3 class="text text-info">Add New Notice/ News </h3>
	<a href="{{ route('notice_list') }}" class="btn btn-info" style="margin-bottom: 10px;"> Notice List</a>

	<div class="row">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		<div class="col-md-12">
			<?php  $notice = $data['notice']; ?>
			{{--  Doctor Registration Form Start   --}}
			<form enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="title">Notice/News Title <span class="required_field"> (*) </span> </label>
					<input type="text" readonly name="title" id="title"  required class="form-control"  value="{{ $notice->title }}">
				</div>

				<div class="form-group">
					<p> Description  <span class="required_field"> (*) </span> </p>
					<hr>
					<p> {{ $notice->description }} </p>
				
				</div>

				<div class="form-group">
					<label for="title"> Created At </label>
					<input type="text" readonly  value="{{  date('d-m-Y', strtotime( $notice->created_at  )); }}" class="form-control">
				</div>

				<div class="form-group">
					<label for="title"> Updated At </label>
					<input type="text" readonly  value="{{ date('d-m-Y', strtotime( $notice->updated_at  )); }}" class="form-control">
				</div>

				<div class="form-group">
					<label for="image">  Image </label>
					<img src="{{ asset('/images/' . $notice->image )}}"  width="300" height="150">
				</div>

				<a  href="{{ route('notice_list') }}" type="button" class="btn btn-primary">Back To List</a>
			</form>
			{{--  Doctor Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
