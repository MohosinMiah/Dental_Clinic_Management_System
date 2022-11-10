@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h3 class="text text-info">Add New Doctor</h3>
	<a href="{{ route('doctor_list') }}" class="btn btn-info" style="margin-bottom: 10px;"> Doctor List</a>
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
		<div class="col-md-12">
			{{--  Doctor Registration Form Start   --}}
			<form method="post" action="{{ route('doctor_registration_save') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">Doctor Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  required class="form-control"  placeholder="Doctor Name" >
				</div>

				<div class="form-group">
					<label for="phone"> Phone Number  <span class="required_field"> (*) </span> </label>
					<input type="text" name="phone" id="phone"  required class="form-control"  minlength="11" maxlength="11" placeholder="Ex, 01773193256" >
				</div>

				
				<div class="form-group">
					<label for="email"> Doctor Email  </label>
					<input type="email" name="email" id="email"  class="form-control"  placeholder="Doctor Email">
				</div>

				<div class="form-group">
					<label for="designation"> Doctor Designation  </label>
					<input type="text" name="designation" id="designation" class="form-control"   placeholder="Doctor Designation">
				</div>

				<div class="form-group">
					<label for="personal_home_page"> Personal Portfolio URL  </label>
					<input type="text" name="personal_home_page" id="personal_home_page" class="form-control"   placeholder="Doctor Portfolio URL">
				</div>


				<div class="form-group">
					<label for="degress"> Doctor Degress  </label>
					<input type="text" name="degress" id="degress" class="form-control"   placeholder="Doctor Degress">
				</div>


				<div class="form-group">
					<label for="department"> Doctor Department </label>
					<input type="text" name="department" id="department" class="form-control"   placeholder="Doctor Department">
				</div>


				<div class="form-group">
					<label for="specialist"> Doctor Specility </label>
					<input type="text" name="specialist" id="specialist" class="form-control"   placeholder="Doctor Specility">
				</div>


				<div class="form-group">
					<label for="date_of_birth"> Doctor Date Of Birth  </label>
					<input type="date" format="d/m/Y" name="date_of_birth" id="date_of_birth" class="form-control"   placeholder="Doctor DateOfBirth" >
				</div>


				<div class="form-group">
					<label class=" control-label"> Gender  </label>
					<div>
							<select class="form-control" name="gender" id="gender" >
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>
					</div>
				</div>



				<div class="form-group">
					<label class=" control-label"> Blood Group </label>
					<div>
						<select class="form-control" name="blood_group" id="blood_group" >
							<option value="A+" selected>A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label for="address"> Doctor Address </label>
					<input type="text" name="address" id="address" class="form-control"   placeholder="Doctor Address" >
				</div>


				<div class="form-group">
					<label for="about_me"> Doctor Bio  </label>
					<input type="text" name="about_me" id="about_me" class="form-control"   placeholder="About Doctor">
				</div>


				<div class="form-group">
					<label for="profile_pic"> Doctor Image  </label>
					<input type="file" name="profile_pic" id="profile_pic" class="form-control"   placeholder="Doctor Image">
				</div>

				<button type="submit" class="btn btn-primary">Add</button>
			</form>
			{{--  Doctor Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
