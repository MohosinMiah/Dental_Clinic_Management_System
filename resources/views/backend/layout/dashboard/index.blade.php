@extends('backend.home')

@section('content')

<div class="container-fluid">
	
	<div class="service-icons">
		<a href="{{ route( 'patient_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/settings.png" alt="Patients">
			</div>
			<p>Patients</p>
		</a>
	
		<a href="{{ route( 'patient_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
	
				<img src="/images/settings.png" alt="Appointments">
	
			</div>
			<p>Appointments</p>
		</a>
	
		<a href="{{ route( 'patient_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
	
				<img src="/images/settings.png" alt="Notices">
	
			</div>
			<p>Notices</p>
		</a>
	
		<a href="{{ route( 'patient_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/settings.png" alt="Invoices">
	
			</div>
			<p>Invoices</p>
		</a>
	
		<a href="{{ route( 'patient_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/settings.png" alt="Doctors">
	
			</div>
			<p>Doctors</p>
		</a>
	
		<a href="{{ route( 'patient_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/settings.png" alt="Dummy">
	
			</div>
			<p>Dummy</p>
		</a>
	
		<a href="{{ route( 'patient_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/settings.png" alt="Dummy">
	
			</div>
			<p>Dummy</p>
		</a>
		<a href="{{ route( 'patient_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/settings.png" alt="Dummy">
	
			</div>
			<p>Dummy</p>
		</a>
	</div>
	<hr>
	
</div>

@endsection
