@extends('backend.home')

@section('css')

@endsection


@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"> Edit User</h1>
<a href="{{ route('add_new_user') }}" class="btn btn-info">Add User</a>
<a href="{{ route( 'user_list' ) }}" class="btn btn-success"> User List</a>
<a href="{{ route( 'clinic_info' ) }}" class="btn btn-danger"> Clinic Info  Setting</a>
<br>
<br>
	<div class="row">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
<hr>

		<div class="col-md-12">
			{{--  User Update Form Start   --}}

			<form method="post" action="{{ route('clinic_update_user', $data['user']->id) }}" enctype="multipart/form-data">
				@csrf

				<div class="form-group">
					<label for="phone"> User Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  required class="form-control" value="{{ $data['user']->name }}"  />
				</div>

				<div class="form-group">
					<label for="email">User Phone <span class="required_field"> (*) </span> </label>
					<input type="text" name="phone" id="phone"  required class="form-control"  value="{{ $data['user']->phone }}"  minlength="11" maxlength="11" placeholder="Ex, 01773193256" />
				</div>

				<div class="form-group">
					<label for="password">Password ( <span style="font-weight:bold;color:red;">Do not change If you do not want to change that user password</span> ) </label>
					<input type="password" name="password" id="password"  autocomplete="new-password" class="form-control" />
				</div>
				
				<div class="form-group">
					<label for="email"> User Email  </label>
					<input type="text" name="email" id="email" value="{{ $data['user']->email }}"   class="form-control"   />
				</div>

				<button type="submit" class="btn btn-primary">Update User</button> 

			</form>

			{{--  User Update Form Start   --}}

		</div>
	</div>

</div>

@endsection


@section('js')
	

@endsection