@extends('backend.home')

@section('content')

<div class="container-fluid">
	<?php $patient = $data['patient'];  ?>
	<!-- Page Heading -->
	<a href="{{ route('patient_list') }}" class="btn btn-info" style="margin-bottom: 10px;"> Patient List </a>
	<h3 class="text text-info">View Patient : {{ $patient->name }} , ID: {{  $patient->id }}</h3>
	<div class="row">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		<div class="col-md-12">
			

			{{--  Patient Registration Form Start   --}}
			<form  enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">Patient Name <span class="required_field"> (*) </span> </label>
					<input type="text" readonly name="name" id="name"  required class="form-control"  value="{{ $patient->name }}">
				</div>

				<div class="form-group">
					<label for="phone"> Phone Number  <span class="required_field"> (*) </span> </label>
					<input type="text" readonly name="phone" id="phone"  required class="form-control"   value="{{ $patient->phone }}">
				</div>

				<div class="form-group">
					<label for="age"> Age <span class="required_field"> (*) </span> </label>
					<input type="number" readonly name="age" id="age" required class="form-control" value="{{ $patient->age}}">
				</div>

				<div class="form-group">
					<label for="email"> Email  </label>
					<input type="email" readonly name="email" id="email" required class="form-control" value="{{ $patient->email }}">
				</div>

				<div class="form-group">
					<label class=" control-label"> Gender <span class="required_field"> (*) </span> </label>
					<div>
							<select class="form-control" readonly name="gender" id="gender" required>
							<option value="Male" <?php if( $patient->gender == 'Male' ) { echo "selected"; } ?> >Male</option>
							<option value="Female" <?php if( $patient->gender == 'Female' ) { echo "selected"; } ?> >Female</option>
							<option value="Other" <?php if( $patient->gender == 'Other' ) { echo "selected"; } ?> >Other</option>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label class=" control-label"> Blood Group</label>
					<div>
						<select class="form-control" readonly name="blood_group" id="blood_group">
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
					<input type="text" readonly name="address" id="address" class="form-control"   value="{{ $patient->address }}" >
				</div>

				<fieldset>
					<div class="row">
						<div class="form-group col-md-12">
							<h2>Please select Illness as following</h2>
						</div>
						<div class="form-group col-md-3">
							<label class="control-label"> DM </label>
							<div class="">
								<select class="form-control" name="db" readonly>
									<option value="No" <?php if( $patient->db == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->db == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-3">
							<label class=" control-label"> HTN</label>
							<div class="">
								<select class="form-control" name="htn" readonly>
									<option value="No" <?php if( $patient->htn == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->htn == "Yes" ) { echo "selected"; } ?>>Yes</option>

								</select>
							</div>
						</div>
		
						<div class="form-group col-md-3">
							<label class=" control-label"> Cardiac Diseases</label>
							<div>
								<select class="form-control" name="cardiac_disease" readonly>
									<option value="No" <?php if( $patient->cardiac_disease == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->cardiac_disease == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Renal Disease</label>
							<div>
								<select class="form-control" name="renal_disease" readonly>
									<option value="No" <?php if( $patient->renal_disease == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes"  <?php if( $patient->renal_disease == "Yes" ) { echo "selected"; } ?> >Yes</option>
								</select>
							</div>
						</div>

						
						<div class="form-group col-md-3">
							<label class=" control-label"> Hepatitis</label>
							<div>
								<select class="form-control" name="hepatitis" readonly>
									<option value="No" <?php if( $patient->hepatitis == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->hepatitis == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Asthma</label>
							<div>
								<select class="form-control" name="asthma" readonly >
									<option value="No" <?php if( $patient->asthma == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->asthma == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Rheumatic fever</label>
							<div>
								<select class="form-control" name="rheumatic_fever" readonly >
									<option value="No" <?php if( $patient->rheumatic_fever == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->rheumatic_fever == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Bleeding disorder</label>
							<div>
								<select class="form-control" name="bleeding_disorder" readonly >
									<option value="No" <?php if( $patient->bleeding_disorder == "No" ) { echo "selected"; } ?> >No</option>
									<option value="Yes" <?php if( $patient->bleeding_disorder == "Yes" ) { echo "selected"; } ?> >Yes</option>
								</select>
							</div>
						</div>



						<div class="form-group col-md-3">
							<label class=" control-label"> Drug allergy</label>
							<div>
								<select class="form-control" name="drug_allergy" readonly >
									<option value="No" <?php if( $patient->drug_allergy == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->drug_allergy == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>



						<div class="form-group col-md-3">
							<label class=" control-label"> Pregnant ( women )</label>
							<div>
								<select class="form-control" name="pregnant_women" readonly >
									<option value="No" <?php if( $patient->pregnant_women == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->pregnant_women == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Lactating ( mother )</label>
							<div>
								<select class="form-control" name="lactating_mother" readonly >
									<option value="No" <?php if( $patient->lactating_mother == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( $patient->lactating_mother == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-12">
							<label class="control-label" for="note"> Note </label>
							<div>
								<textarea class="form-control" rows="2" readonly name="note" id="note">{{ $patient->note }} </textarea>
							</div>
						</div>
					</div> 

				</fieldset>


				<a  href="{{ route('patient_list') }}" type="button" class="btn btn-primary">Back To List</a>
			</form>
			{{--  Patient Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
