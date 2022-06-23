@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Add New Notice/ News </h1>

	<div class="row">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		<div class="col-md-12">
			{{--  Doctor Registration Form Start   --}}
			<form method="post" action="{{ route('notice_added_save') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="title">Notice/News Title <span class="required_field"> (*) </span> </label>
					<input type="text" name="title" id="title"  required class="form-control"  placeholder="Notice Title">
				</div>

				<div class="form-group">
					<p> Description  <span class="required_field"> (*) </span> </p>
					<textarea name="description" cols="100" rows="5"></textarea>
				
				</div>

				<div class="form-group">
					<label for="image"> Image  <span class="required_field"> </span> </label>
					<input type="file" name="image" id="image"  required class="form-control">
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			{{--  Doctor Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
