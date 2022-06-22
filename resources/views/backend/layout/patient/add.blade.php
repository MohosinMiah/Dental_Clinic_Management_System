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
		<div class="col-md-12">
			{{--  Patient Registration Form Start   --}}
			<form method="post" action="{{ route('patient_registration_save') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">Patient Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="name"  required class="form-control"  placeholder="Patient Name">
				</div>

				<div class="form-group">
					<label for="phone"> Phone Number  <span class="required_field"> (*) </span> </label>
					<input type="text" name="phone" id="phone"  required class="form-control"  placeholder="Patient Phone">
				</div>

				<div class="form-group">
					<label for="age"> Age <span class="required_field"> (*) </span> </label>
					<input type="number" name="age" id="age" required class="form-control" placeholder="Patient Age , Ex: 50 ">
				</div>

				<div class="form-group">
					<label for="email"> Email  </label>
					<input type="email" name="email" id="email" required class="form-control" placeholder="Patient Email Address ">
				</div>

				<div class="form-group">
					<label class=" control-label"> Gender <span class="required_field"> (*) </span> </label>
					<div>
							<select class="form-control" name="gender" id="gender" required>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label class=" control-label"> Blood Group</label>
					<div>
						<select class="form-control" name="blood_group" id="blood_group">
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
					<label for="address"> Patient Address  </label>
					<input type="text" name="address" id="address" class="form-control"   placeholder="Patient Address">
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
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label class=" control-label"> HighBlood Pressure</label>
							<div class="">
								<select class="form-control" name="high_blood">
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
		
						<div class="form-group col-md-4">
							<label class=" control-label"> Diabetic</label>
							<div>
								<select class="form-control" name="diabetic">
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						
						<div class="form-group col-md-12">
							<label class="control-label" for="note"> Note </label>
							<div>
								<textarea class="form-control" rows="2" name="note" id="note"></textarea>
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