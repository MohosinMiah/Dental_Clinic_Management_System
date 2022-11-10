@extends('backend.home')

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

@endsection

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-md-12">
			{{--  appointment List  Start   --}}

				
<div class="container-fluid">

<!-- Page Heading -->
<h3 class="text-info"> Clinic Settings - Update Clinic Information
</h3>
<a href="{{ route('add_new_user') }}" class="btn btn-info">Add User</a>
<a href="{{ route( 'user_list' ) }}" class="btn btn-success"> User List</a>
<br>
<br>
<div class="row">
@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif

		@if (Session::has('message'))
			<h4 class="text-info">{!! session('message') !!}</h4>
		@endif

		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	<hr>
<h3 class="text text-info">Update Clinic Information</h3>
	<div class="col-md-12">
		{{--  Doctor Registration Form Start   --}}
		<form method="post" action="{{ route('clinic_info_update') }}" enctype="multipart/form-data">
			@csrf


			<div class="form-group">
				<label for="phone"> Clinic Phone Number  <span class="required_field"> (*) </span> </label>
				<input type="text" name="phone" id="phone"  required class="form-control" value="{{ $data['clinic_info']->phone }}" />
			</div>

			<div class="form-group">
				<label for="email">Clinic  Email  <span class="required_field"> (*) </span> </label>
				<input type="email" name="email" id="email"  required class="form-control"   value="{{ $data['clinic_info']->email }}" />
			</div>
			
			<div class="form-group">
				<label for="address"> Clinic Address  <span class="required_field"> (*) </span> </label>
				<input type="text" name="address" id="address"  required class="form-control"   value="{{ $data['clinic_info']->address }}" required />
			</div>



			<div class="form-group">
				<label for="note">Note </span> </label>
				</br>
				<textarea cols="50" rows="5" name="note" id="note">{{ $data['clinic_info']->note }}</textarea>
			</div>

			<div class="form-group">
				<label for="logo"> Clinic Logo  </label>
				<input type="file" name="logo" id="logo" class="form-control"  placeholder="Doctor Image"  />
				<img src="{{ asset('/images/' . $data['clinic_info']->logo )}}"  width="300" height="150">
			</div>

			<button type="submit" class="btn btn-primary">Update</button> 

		</form>
		{{--  Doctor Registration Form Start   --}}

	</div>
</div>

</div>
			{{--  appointment List  Start   --}}

		</div>
	</div>

</div>

@endsection
