@extends('backend.home')

@section('css')

@endsection


@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"> View Appointment</h1>

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
			{{--  Appointment View   --}}
			<form method="post">
				@csrf

				
				<div class="form-group">
					<label class=" control-label"> Is Patient Registered ? <span class="required_field"> (*) </span></label>
					<div>
						<select class="form-control" name="isRegistered" id="isRegistered" readonly>

							<option value="No" <?php if( $data['appointment']->isRegistered == "No"){ echo "selected"; } ?>>No</option>
							<option value="Yes" <?php if( $data['appointment']->isRegistered == "Yes"){ echo "selected"; } ?>>Yes</option>


						</select>
					</div>
				</div>
				<?php
				if( $data['appointment']->isRegistered == 'Yes' )
				{
					?>
				<div class="form-group" id="patient_id_display" style="display:block">
					<label for="patient_id" class="control-label">Patient ID <i class="text-danger">*</i></label>
					<div class="">
						<input  autocomplete="off"  id="patient_id" name="patient_id"  class="form-control" type="number" value="{{ $data['appointment']->patient_id }}" readonly />
						<span id="csc" class="text-center invlid_patient_id">Search With Patient ID</span>
						<input class="baseUrl" value="{{ URL::to('/'); }}" type="hidden">

					</div>
				</div>
				<?php
				}
				?>
				<div class="form-group">
					<label for="patient_phone"> Patient Phone Number  <span class="required_field"> (*) </span> </label>
					<input type="text" name="patient_phone" id="patient_phone"  required class="form-control" value="{{ $data['appointment']->patient_phone }}" readonly />
				</div>

				<div class="form-group">
					<label for="name">Patient Name <span class="required_field"> (*) </span> </label>
					<input type="text" name="name" id="patient_name"  required class="form-control"   value="{{ $data['appointment']->name }}" readonly />
				</div>
				

				<div class="form-group">
					<label class=" control-label"> Data And Time <span class="required_field"> (*) </span></label>
						<div class='col-sm-3'>
							<div class="form-group">
								<div class='input-group date' id='datetimepicker1'>
									<input type="date" name="date" class="form-control"  required pattern="\d{2}-\d{2}-\d{4}"  value="{{ $data['appointment']->date }}" readonly />
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
									</span>
									<input type="time" name="time"  class="form-control"  value="{{ $data['appointment']->time }}" readonly />
								</div>
							</div>
						</div>
				</div>

				<div class="form-group " >
					<label class=" control-label"> Select Doctor <span class="required_field"> (*) </span></label>
					<div>
						<select class="form-control" name="doctor_id" id="doctor_id" readonly >
							@foreach( $data['doctors'] as $doctor )
							<?php if( $doctor->id == $data['appointment']->doctor_id ){ ?>
							<option value="{{ $doctor->id }}" selected>{{ $doctor->name }}</option>
							<?php }else{ ?>
								<option value="{{ $doctor->id }}" >{{ $doctor->name }}</option>
							<?php } ?>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group" >
					<label class=" control-label"> Gender <span class="required_field"> (*) </span></label>
					<div>
						<select class="form-control" name="gender" id="gender" readonly>
							<option value="Male" <?php if( $data['appointment']->isRegistered   == "Male" ){ echo "selected"; } ?> >Male</option>
							<option value="Female" <?php if( $data['appointment']->isRegistered == "Female" ){ echo "selected"; } ?>>Female</option>
							<option value="Other" <?php if( $data['appointment']->isRegistered  == "Other" ){ echo "selected"; } ?>>Other</option>
						</select>
					</div>
				</div>

				
				<div class="form-group">
					<label for="note">Note </span> </label>
				</br>
					<textarea cols="50" rows="5" name="note" id="note" readonly>{{ $data['appointment']->note }}</textarea>
				</div>

				
				<a class="btn btn-primary" href="{{ route('appointment_list') }}">Back To List</a> 
			</form>
			{{--  Doctor Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection


@section('js')
	

@endsection