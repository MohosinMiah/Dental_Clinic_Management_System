@extends('backend.home')

@section('content')

<div class="container-fluid">
	
	<div class="service-icons">

	<a href="{{ route( 'payment_report_index') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/graphical.png" alt="Dummy">
	
			</div>
			<p>Payment Reports</p>
		</a>

	<a href="{{ route( 'patient_report_index') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/graphical.png" alt="Patient Report">
	
			</div>
			<p>Patient Reports</p>
		</a>

		<a href="{{ route( 'graphical_report_all') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/graphical.png" alt="Graphical Report">
	
			</div>
			<p>Graphical Reports</p>
		</a>


		<a href="{{ route( 'appoinment_report_index' ) }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/graphical.png" alt="Appointment Report">
	
			</div>
			<p>Appointment Reports</p>
		</a>
		
		<a href="{{ route( 'patient_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/patient.png" alt="Patients">
			</div>
			<p>Patients</p>
		</a>
	
		<a href="{{ route( 'appointment_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
	
				<img src="/images/appointment.png" alt="Appointments">
	
			</div>
			<p>Appointments</p>
		</a>
	
		<a href="{{ route( 'notice_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
	
				<img src="/images/notice.png" alt="Notices">
	
			</div>
			<p>Notices</p>
		</a>
	
		<a href="{{ route( 'invoice_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/invoice.png" alt="Invoices">
	
			</div>
			<p>Invoices</p>
		</a>
	
		<a href="{{ route( 'doctor_list') }}" class="service-card ">
			<div class="overlay"></div>
			<div class="circle">
				<img src="/images/doctor.png" alt="Doctors">
	
			</div>
			<p>Doctors</p>
		</a>
	
		
	

	</div>
	<hr>
	
</div>

@endsection
