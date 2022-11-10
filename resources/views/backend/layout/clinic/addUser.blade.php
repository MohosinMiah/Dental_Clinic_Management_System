@extends('backend.home')

@section('css')

@endsection


@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"> Add New User</h1>
<a href="{{ route('add_new_user') }}" class="btn btn-info">Add User</a>
<a href="{{ route( 'user_list' ) }}" class="btn btn-success"> User List</a>
<a href="{{ route( 'clinic_info' ) }}" class="btn btn-danger"> Clinic Info  Setting</a>
<br>
<br>
	<div class="row">
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

		<div class="col-md-12">
			{{--  Doctor Registration Form Start   --}}

			<form method="post" action="{{ route('add_new_user_post') }}" enctype="multipart/form-data">
				@csrf

				<div class="form-group">
					<label for="phone"> User Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  required class="form-control" value="{{ old('name') }}"  />
				</div>

				<div class="form-group">
					<label for="email">User Phone <span class="required_field"> (*) </span> </label>
					<input type="text"  name="phone"    id="phone"  required class="form-control"  value="{{ old('phone') }}" minlength="11" maxlength="11" placeholder="Ex, 01773193256" />
				</div>

				<div class="form-group">
					<label for="password">Password <span class="required_field"> (*) </span> </label>
					<input type="password" name="password" id="password"  required class="form-control" />
				</div>
				
				<div class="form-group">
					<label for="email"> User Email  </label>
					<input type="text" name="email" id="email"   class="form-control"   value="{{ old('email') }}"  />
				</div>

				<button type="submit" class="btn btn-primary">Add User</button> 

			</form>

			{{--  Doctor Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection


@section('js')
	

@endsection