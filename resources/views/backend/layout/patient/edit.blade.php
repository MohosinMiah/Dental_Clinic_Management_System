@extends('backend.home')

@section('content')

<div class="container-fluid">
	<?php $patient = $data['patient'];  ?>
	<!-- Page Heading -->
	<a href="{{ route('patient_list') }}" class="btn btn-info" style="margin-bottom: 10px;"> Patient List</a>
	<h3 class="text text-info">Edit Patient</h3>
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
			

			{{--  Patient Registration Form Start   --}}
			<form method="post" action="{{ route('patient_update_save', $patient->id) }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">Patient Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  required class="form-control"  value="{{ $patient->name }}">
				</div>

				<div class="form-group">
					<label for="phone"> Phone Number  <span class="required_field"> (*) </span> </label>
					<input type="text" name="phone" id="phone"  required class="form-control"   value="{{ $patient->phone }}" minlength="11" maxlength="11" placeholder="Ex, 01773193256" />
				</div>

				<div class="form-group">
					<label for="age"> Age </label>
					<input type="number" name="age" id="age"  class="form-control" value="{{ $patient->age}}">
				</div>

				<div class="form-group">
					<label for="email"> Email  </label>
					<input type="email" name="email" id="email"  class="form-control" value="{{ $patient->email }}">
				</div>

				<div class="form-group">
					<label class=" control-label"> Gender  </label>
					<div>
							<select class="form-control" name="gender" id="gender" >
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
						<div class="form-group col-md-3">
							<label class="control-label"> DB </label>
							<div class="">
								<select class="form-control" name="db">
									<option value="No" <?php if( $patient->db == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->db == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-3">
							<label class=" control-label"> HTN</label>
							<div class="">
								<select class="form-control" name="htn">
									<option value="No" <?php if( $patient->htn == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->htn == "Yes" ) { echo "selected"; } ?>>Yes</option>

								</select>
							</div>
						</div>
		
						<div class="form-group col-md-3">
							<label class=" control-label"> Cardiac Diseases</label>
							<div>
								<select class="form-control" name="cardiac_disease">
									<option value="No" <?php if( $patient->cardiac_disease == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->cardiac_disease == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Renal Disease</label>
							<div>
								<select class="form-control" name="renal_disease">
									<option value="No" <?php if( $patient->renal_disease == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes"  <?php if( $patient->renal_disease == "Yes" ) { echo "selected"; } ?> >Yes</option>
								</select>
							</div>
						</div>

						
						<div class="form-group col-md-3">
							<label class=" control-label"> Hepatitis</label>
							<div>
								<select class="form-control" name="hepatitis">
									<option value="No" <?php if( $patient->hepatitis == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->hepatitis == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Asthma</label>
							<div>
								<select class="form-control" name="asthma">
									<option value="No" <?php if( $patient->asthma == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->asthma == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Rheumatic fever</label>
							<div>
								<select class="form-control" name="rheumatic_fever">
									<option value="No" <?php if( $patient->rheumatic_fever == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->rheumatic_fever == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Bleeding disorder</label>
							<div>
								<select class="form-control" name="bleeding_disorder">
									<option value="No" <?php if( $patient->bleeding_disorder == "No" ) { echo "selected"; } ?> >No</option>
									<option value="Yes" <?php if( $patient->bleeding_disorder == "Yes" ) { echo "selected"; } ?> >Yes</option>
								</select>
							</div>
						</div>



						<div class="form-group col-md-3">
							<label class=" control-label"> Drug allergy</label>
							<div>
								<select class="form-control" name="drug_allergy">
									<option value="No" <?php if( $patient->drug_allergy == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->drug_allergy == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>



						<div class="form-group col-md-3">
							<label class=" control-label"> Pregnant ( women )</label>
							<div>
								<select class="form-control" name="pregnant_women">
									<option value="No" <?php if( $patient->pregnant_women == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->pregnant_women == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Lactating ( mother )</label>
							<div>
								<select class="form-control" name="lactating_mother">
									<option value="No" <?php if( $patient->lactating_mother == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->lactating_mother == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-12">
							<label class="control-label" for="note"> Note </label>
							<div>
								<textarea class="form-control" rows="2" name="note" id="note">{{ $patient->note }} </textarea>
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
