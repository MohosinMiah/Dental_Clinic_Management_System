@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Register New Patient</h1>

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
			<form method="post" action="{{ route('patient_registration_save') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">Patient Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  value="{{ old('name') }}"  required class="form-control"  placeholder="Patient Name">
				</div>

				<div class="form-group">
					<label for="phone"> Phone Number  <span class="required_field"> (*) </span> </label>
					<input type="text" name="phone" id="phone" value="{{ old('phone') }}" required class="form-control"  placeholder="Patient Phone">
				</div>

				<div class="form-group">
					<label for="age"> Age <span class="required_field"> (*) </span> </label>
					<input type="number" name="age" id="age" value="{{ old('age') }}" required class="form-control" placeholder="Patient Age , Ex: 50 ">
				</div>

				<div class="form-group">
					<label for="email"> Email  </label>
					<input type="email" name="email" id="email" value="{{ old('email') }}"  class="form-control" placeholder="Patient Email Address ">
				</div>

				<div class="form-group">
					<label class=" control-label"> Gender <span class="required_field"> (*) </span> </label>
					<div>
							<select class="form-control" name="gender" id="gender" required>
							<option value="Male" <?php if( old('gender') == "Male" ) { echo "selected"; } ?>>Male</option>
							<option value="Female" <?php if( old('gender') == "Female" ) { echo "selected"; } ?>>Female</option>
							<option value="Other"  <?php if( old('gender') == "Other" ) { echo "selected"; } ?>>Other</option>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label class=" control-label"> Blood Group</label>
					<div>
						<select class="form-control" name="blood_group" id="blood_group">
							<option value="A+" <?php if( old('blood_group') == "A+" ) { echo "selected"; } ?>>A+</option>
							<option value="A-" <?php if( old('blood_group') == "A-" ) { echo "selected"; } ?>>A-</option>
							<option value="B+" <?php if( old('blood_group') == "B+" ) { echo "selected"; } ?>>B+</option>
							<option value="B-" <?php if( old('blood_group') == "B-" ) { echo "selected"; } ?>>B-</option>
							<option value="O+" <?php if( old('blood_group') == "O+" ) { echo "selected"; } ?>>O+</option>
							<option value="O-" <?php if( old('blood_group') == "O-" ) { echo "selected"; } ?>>O-</option>
							<option value="AB+" <?php if( old('blood_group') == "AB+" ) { echo "selected"; } ?>>AB+</option>
							<option value="AB-" <?php if( old('blood_group') == "AB-" ) { echo "selected"; } ?>>AB-</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="address"> Patient Address  </label>
					<input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control"   placeholder="Patient Address">
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
									<option value="No" <?php if( old('db') == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( old('db') == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-3">
							<label class=" control-label"> HTN</label>
							<div class="">
								<select class="form-control" name="htn">
									<option value="No" <?php if( old('htn') == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( old('htn') == "Yes" ) { echo "selected"; } ?>>Yes</option>

								</select>
							</div>
						</div>
		
						<div class="form-group col-md-3">
							<label class=" control-label"> Cardiac Diseases</label>
							<div>
								<select class="form-control" name="cardiac_disease">
									<option value="No" <?php if( old('cardiac_disease') == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( old('cardiac_disease') == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Renal Disease</label>
							<div>
								<select class="form-control" name="renal_disease">
									<option value="No" <?php if( old('renal_disease') == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes"  <?php if( old('renal_disease') == "Yes" ) { echo "selected"; } ?> >Yes</option>
								</select>
							</div>
						</div>

						
						<div class="form-group col-md-3">
							<label class=" control-label"> Hepatitis</label>
							<div>
								<select class="form-control" name="hepatitis">
									<option value="No" <?php if( old('hepatitis') == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( old('hepatitis') == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Asthma</label>
							<div>
								<select class="form-control" name="asthma">
									<option value="No" <?php if( old('asthma') == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( old('asthma') == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Rheumatic fever</label>
							<div>
								<select class="form-control" name="rheumatic_fever">
									<option value="No" <?php if( old('rheumatic_fever') == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( old('rheumatic_fever') == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Bleeding disorder</label>
							<div>
								<select class="form-control" name="bleeding_disorder">
									<option value="No" <?php if( old('bleeding_disorder') == "No" ) { echo "selected"; } ?> >No</option>
									<option value="Yes" <?php if( old('bleeding_disorder') == "Yes" ) { echo "selected"; } ?> >Yes</option>
								</select>
							</div>
						</div>



						<div class="form-group col-md-3">
							<label class=" control-label"> Drug allergy</label>
							<div>
								<select class="form-control" name="drug_allergy">
									<option value="No" <?php if( old('drug_allergy') == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( old('drug_allergy') == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>



						<div class="form-group col-md-3">
							<label class=" control-label"> Pregnant ( women )</label>
							<div>
								<select class="form-control" name="pregnant_women">
									<option value="No" <?php if( old('pregnant_women') == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( old('pregnant_women') == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-3">
							<label class=" control-label"> Lactating ( mother )</label>
							<div>
								<select class="form-control" name="lactating_mother">
									<option value="No" <?php if( old('lactating_mother') == "No" ) { echo "selected"; } ?>>No</option>
									<option value="Yes" <?php if( old('lactating_mother') == "Yes" ) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-12">
							<label class="control-label" for="note"> Note </label>
							<div>
								<textarea class="form-control" rows="2" name="note" id="note">{{ old('note') }} </textarea>
							</div>
						</div>
					</div> 

				</fieldset>

				<button type="submit" class="btn btn-primary">Add New</button>
			</form>
			{{--  Patient Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection


@section('js')  
<script type="text/javascript">
    $('.datepicker').datepicker({
        startDate: '-3d'
    });
</script>
@endsection