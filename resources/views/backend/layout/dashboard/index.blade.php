@extends('backend.home')

@section('content')

<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-3">
			<div class="card" style="width: 18rem;">
				<a href="{{ route( 'patient_list') }}">
				<img class="card-img-top" src="/images/settings.png" alt="Card image cap" />
				</a>
				<div class="card-body">
				  <a href="{{ route( 'patient_list') }}" class="btn btn-primary">Patients</a>
				</div>
			  </div>
		</div>
		
		<div class="col-md-3">
			<div class="card" style="width: 18rem;">
				<a href="{{ route( 'appointment_list') }}">
				<img class="card-img-top" src="/images/settings.png" alt="Card image cap" />
				</a>
				<div class="card-body">
				  <a href="{{ route( 'appointment_list') }}" class="btn btn-primary">Appointments</a>
				</div>
			  </div>
		</div>

	

		<div class="col-md-3">
			
			<div class="card" style="width: 18rem;">
				<a href="{{ route( 'notice_list') }}">
				<img class="card-img-top" src="/images/settings.png" alt="Card image cap" />
				</a>
				<div class="card-body">
				  <a href="{{ route( 'notice_list') }}" class="btn btn-primary">Notices</a>
				</div>
			  </div>
		</div>

		<div class="col-md-3">
			<div class="card" style="width: 18rem;">
				<a href="{{ route( 'invoice_list') }}">
				<img class="card-img-top" src="/images/settings.png" alt="Card image cap" />
				</a>
				<div class="card-body">
				  <a href="{{ route( 'invoice_list' ) }}" class="btn btn-primary">Invoices</a>
				</div>
			  </div>
		</div>

	
		<div class="col-md-3">
			<div class="card" style="width: 18rem;">
				<a href="{{ route( 'doctor_list') }}">
				<img class="card-img-top" src="/images/settings.png" alt="Card image cap" />
				</a>
				<div class="card-body">
				  <a href="{{ route( 'doctor_list' ) }}" class="btn btn-primary">Doctors</a>
				</div>
			  </div>
		</div>
	</div>
	<hr>
	
</div>

@endsection
