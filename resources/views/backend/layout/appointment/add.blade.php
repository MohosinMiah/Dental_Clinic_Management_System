@extends('backend.home')

@section('css')

@endsection


@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"> Add New Appointment</h1>

	<script src="{{ asset('js/invoice.js')}}"></script>
	<script src="{{ asset('js/services.js')}}"></script>
	<script src="{{ asset('js/custom.js')}}"></script>

	<div class="row">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif

		<div class="col-md-12">
			{{--  Doctor Registration Form Start   --}}
			<form method="post" action="{{ route('appointment_registration_save') }}" enctype="multipart/form-data">
				@csrf

				
				<div class="form-group">
					<label class=" control-label"> Is Patient Registered ? <span class="required_field"> (*) </span></label>
					<div>
						<select class="form-control" name="isRegistered" id="isRegistered">
							<option value="No">No</option>
							<option value="Yes">Yes</option>
						</select>
					</div>
				</div>

				<div class="form-group" id="patient_id_display" style="display:none">
					<label for="patient_id" class="control-label">Patient ID <i class="text-danger">*</i></label>
					<div class="">
						<input  autocomplete="off"  id="patient_id" name="patient_id"  class="form-control" type="number">
						<span id="csc" class="text-center invlid_patient_id">Search With Patient ID</span>
						<input class="baseUrl" value="{{ URL::to('/'); }}" type="hidden">

					</div>
				</div>
				
				<div class="form-group">
					<label for="patient_phone"> Patient Phone Number  <span class="required_field"> (*) </span> </label>
					<input type="text" name="patient_phone" id="patient_phone"  required class="form-control"  placeholder="Patient Phone Number">
				</div>

				<div class="form-group">
					<label for="name">Patient Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="patient_name"  required class="form-control"  placeholder="Patient Name">
				</div>
				

				<div class="form-group">
					<label class=" control-label"> Data And Time <span class="required_field"> (*) </span></label>
						<div class='col-sm-3'>
							<div class="form-group">
								<div class='input-group date' id='datetimepicker1'>
									<input type="date" name="date" class="form-control"  required pattern="\d{2}-\d{2}-\d{4}" />
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
									</span>
									<input type="time" name="time"  class="form-control" />
								</div>
							</div>
						</div>
				</div>

				<div class="form-group " >
					<label class=" control-label"> Select Doctor <span class="required_field"> (*) </span></label>
					<div>
						<select class="form-control" name="doctor_id" id="doctor_id">
							@foreach( $data['doctors'] as $doctor )

							<option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
 
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group" >
					<label class=" control-label"> Gender <span class="required_field"> (*) </span></label>
					<div>
						<select class="form-control" name="gender" id="gender" required>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>
					</div>
				</div>

				
				<div class="form-group">
					<label for="note">Note </span> </label>
				</br>
					<textarea cols="50" rows="5" name="note" id="note"></textarea>
				</div>

				
				<button type="submit" class="btn btn-primary">Add New</button> 
			</form>
			{{--  Doctor Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection


@section('js')
	

@endsection