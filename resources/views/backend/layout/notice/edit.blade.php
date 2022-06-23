@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"> Update Notice </h1>

	<div class="row">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		<div class="col-md-12">
			<?php  $notice = $data['notice']; ?>
			{{--  Doctor Registration Form Start   --}}
			<form method="post" action="{{ route('notice_update_save', $notice->id ) }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="title">Notice/News Title <span class="required_field"> (*) </span> </label>
					<input type="text"  name="title" id="title"  required class="form-control"  value="{{ $notice->title }}">
				</div>

				<div class="form-group">
					<p> Description  <span class="required_field"> (*) </span> </p>
					<textarea name="description" cols="100" rows="5">{{ $notice->description }}</textarea>
				
				</div>


				<div class="form-group">
					<label for="image">  Image </label>
					<input type="file" name="image" id="image"  class="form-control">
					<img src="{{ asset('/images/' . $notice->image )}}"  width="300" height="150">
				</div>

				<button type="submit" class="btn btn-primary">Update</button>
			</form>
			{{--  Doctor Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
