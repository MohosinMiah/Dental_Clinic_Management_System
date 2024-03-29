@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h3 class="text text-info">Add New Notice/ News</h3>
	<a href="{{ route('notice_list') }}" class="btn btn-info" style="margin-bottom: 10px;"> Notice List</a>

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
					<label for="image"> Image  </label>
					<input type="file" name="image" id="image"   class="form-control">
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			{{--  Doctor Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
