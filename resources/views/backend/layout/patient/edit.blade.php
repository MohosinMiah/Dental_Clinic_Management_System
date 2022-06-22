@extends('backend.home')

@section('content')

<div class="container-fluid">
	<?php $patient = $data['patient'];  ?>
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Register New Patient</h1>

	<div class="row">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		<div class="col-md-12">
			

			{{--  Patient Registration Form Start   --}}
			<form method="post" action="{{ route('patient_update_save', $patient->id) }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">Patient Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  required class="form-control"  value="{{ $patient->name }}">
				</div>

				<div class="form-group">
					<label for="phone"> Phone Number  <span class="required_field"> (*) </span> </label>
					<input type="text" name="phone" id="phone"  required class="form-control"   value="{{ $patient->phone }}"
				</div>

				<div class="form-group">
					<label for="age"> Age <span class="required_field"> (*) </span> </label>
					<input type="number" name="age" id="age" required class="form-control" value="{{ $patient->age}}">
				</div>

				<div class="form-group">
					<label for="email"> Email  </label>
					<input type="email" name="email" id="email" required class="form-control" value="{{ $patient->email }}">
				</div>

				<div class="form-group">
					<label class=" control-label"> Gender <span class="required_field"> (*) </span> </label>
					<div>
							<select class="form-control" name="gender" id="gender" required>
							<option value="Male" <?php if( $patient->gender == 'Male' ) { echo "selected"; } ?> >Male</option>
							<option value="Female" <?php if( $patient->gender == 'Female' ) { echo "selected"; } ?> >Female</option>
							<option value="Other" <?php if( $patient->gender == 'Other' ) { echo "selected"; } ?> >Other</option>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label class=" control-label"> Blood Group</label>
					<div>
						<select class="form-control" name="blood_group" id="blood_group">
							<option value="A+" <?php if( $patient->blood_group == 'A+' ) { echo "selected"; } ?>>A+</option>
							<option value="A-" <?php if( $patient->blood_group == 'A-' ) { echo "selected"; } ?>>A-</option>
							<option value="B+" <?php if( $patient->blood_group == 'B+' ) { echo "selected"; } ?>>B+</option>
							<option value="B-" <?php if( $patient->blood_group == 'B-' ) { echo "selected"; } ?>>B-</option>
							<option value="O+" <?php if( $patient->blood_group == 'O+' ) { echo "selected"; } ?>>O+</option>
							<option value="O-" <?php if( $patient->blood_group == 'O-' ) { echo "selected"; } ?>>O-</option>
							<option value="AB+" <?php if( $patient->blood_group == 'AB+' ) { echo "selected"; } ?>>AB+</option>
							<option value="AB-" <?php if( $patient->blood_group == 'AB-' ) { echo "selected"; } ?>>AB-</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="address"> Patient Address  </label>
					<input type="text" name="address" id="address" class="form-control"   value="{{ $patient->address }}" >
				</div>

				<fieldset>
					<div class="row">
						<div class="form-group col-md-12">
							<h2>Please select Illness as following</h2>
						</div>
						<div class="form-group col-md-4">
							<label class="control-label"> Heart Diseases </label>
							<div class="">
								<select class="form-control" name="heart_disease">
									<option value="Yes" <?php if( $patient->heart_disease == 'Yes' ) { echo "selected"; } ?> >Yes</option>
									<option value="No" <?php if( $patient->heart_disease == 'No' ) { echo "selected"; } ?> >No</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label class=" control-label"> HighBlood Pressure</label>
							<div class="">
								<select class="form-control" name="high_blood">
									<option value="Yes" <?php if( $patient->high_blood == 'Yes' ) { echo "selected"; } ?>>Yes</option>
									<option value="No" <?php if( $patient->high_blood == 'No' ) { echo "selected"; } ?>>No</option>
								</select>
							</div>
						</div>
		
						<div class="form-group col-md-4">
							<label class=" control-label"> Diabetic</label>
							<div>
								<select class="form-control" name="diabetic">
									<option value="Yes" <?php if( $patient->diabetic == 'Yes' ) { echo "selected"; } ?> >Yes</option>
									<option value="No" <?php if( $patient->diabetic == 'No' ) { echo "selected"; } ?>>No</option>
								</select>
							</div>
						</div>
						
						<div class="form-group col-md-12">
							<label class="control-label" for="note"> Note </label>
							<div>
								<textarea class="form-control" rows="2" name="note" id="note">{{ $patient->note }}</textarea>
							</div>
						</div>
					</div> 

				</fieldset>

				<button type="submit" class="btn btn-primary">Update</button>
			</form>
			{{--  Patient Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
