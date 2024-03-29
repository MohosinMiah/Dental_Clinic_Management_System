@extends('backend.home')

@section('content')

<div class="container-fluid">
	<?php $doctor = $data['doctor']; ?>

	<!-- Page Heading -->
	<h1 class="text text-info">View doctor : {{ $doctor->name }} , ID: {{  $doctor->id }}</h1>
	<a href="{{ route('doctor_list') }}" class="btn btn-info" style="margin-bottom: 10px;"> Doctor List</a>

	<div class="row">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		<div class="col-md-12">
			{{--  Doctor Registration Form Start   --}}
			<form  enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">Doctor Name <span class="required_field"> (*) </span> </label>
					<input type="text" readonly name="name" id="name"  required class="form-control" value="{{ $doctor->name }}">
				</div>

				<div class="form-group">
					<label for="phone"> Phone Number  <span class="required_field"> (*) </span> </label>
					<input type="text" readonly name="phone" id="phone"  required class="form-control"  value="{{ $doctor->phone }}">
				</div>

				<div class="form-group">
					<label for="email"> Doctor Email  </label>
					<input type="email" readonly name="email" id="email"  class="form-control"  value="{{ $doctor->email }}">
				</div>

				<div class="form-group">
					<label for="designation"> Doctor Designation  </label>
					<input type="text" readonly name="designation" id="designation" class="form-control"   value="{{ $doctor->designation }}">
				</div>

				<div class="form-group">
					<label for="personal_home_page"> Personal Portfolio URL  </label>
					<input type="text" readonly name="personal_home_page" id="personal_home_page" class="form-control"   value="{{ $doctor->personal_home_page }}">
				</div>


				<div class="form-group">
					<label for="degress"> Doctor Degress  </label>
					<input type="text" readonly name="degress" id="degress" class="form-control" value="{{ $doctor->degress }}">
				</div>


				<div class="form-group">
					<label for="department"> Doctor Department </label>
					<input type="text" readonly name="department" id="department" class="form-control"   value="{{ $doctor->department }}">
				</div>


				<div class="form-group">
					<label for="specialist"> Doctor Specility </label>
					<input type="text" readonly name="specialist" id="specialist" class="form-control"   value="{{ $doctor->specialist }}">
				</div>


				<div class="form-group">
					<label for="date_of_birth"> Doctor Date Of Birth </label>
					<input type="text" readonly name="date_of_birth" id="date_of_birth" class="form-control"   value="{{ $doctor->date_of_birth }}">
				</div>


				<div class="form-group">
					<label class=" control-label"> Gender <span class="required_field"> (*) </span> </label>
					<div>
							<select class="form-control" readonly name="gender" id="gender" required>
							<option value="Male" <?php if( $doctor->gender == 'Male' ) { echo "selected"; } ?> >Male</option>
							<option value="Female" <?php if( $doctor->gender == 'Female' ) { echo "selected"; } ?> >Female</option>
							<option value="Other" <?php if( $doctor->gender == 'Other' ) { echo "selected"; } ?> >Other</option>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label class=" control-label"> Blood Group</label>
					<div>
						<select class="form-control" readonly name="blood_group" id="blood_group">
							<option value="A+" <?php if( $doctor->blood_group == 'A+' ) { echo "selected"; } ?>>A+</option>
							<option value="A-" <?php if( $doctor->blood_group == 'A-' ) { echo "selected"; } ?>>A-</option>
							<option value="B+" <?php if( $doctor->blood_group == 'B+' ) { echo "selected"; } ?>>B+</option>
							<option value="B-" <?php if( $doctor->blood_group == 'B-' ) { echo "selected"; } ?>>B-</option>
							<option value="O+" <?php if( $doctor->blood_group == 'O+' ) { echo "selected"; } ?>>O+</option>
							<option value="O-" <?php if( $doctor->blood_group == 'O-' ) { echo "selected"; } ?>>O-</option>
							<option value="AB+" <?php if( $doctor->blood_group == 'AB+' ) { echo "selected"; } ?>>AB+</option>
							<option value="AB-" <?php if( $doctor->blood_group == 'AB-' ) { echo "selected"; } ?>>AB-</option>
						</select>
					</div>
				</div>



				<div class="form-group">
					<label for="address"> Doctor Address  </label>
					<input type="text" readonly name="address" id="address" class="form-control"   value="{{ $doctor->address }}">
				</div>


				<div class="form-group">
					<label for="about_me"> Doctor Bio  </label>
					<input type="text" readonly name="about_me" id="about_me" class="form-control"   value="{{ $doctor->about_me }}">
				</div>


				<div class="form-group">
					<label for="profile_pic"> Doctor Image  </label>
					<input type="file" name="profile_pic" id="profile_pic" class="form-control" >
					<img src="{{ asset('/images/' . $doctor->profile_pic )}}"  width="300" height="150">
				</div>

				<a  href="{{ route('doctor_list') }}" type="button" class="btn btn-primary">Back To List</a>
			</form>
			{{--  Doctor Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
