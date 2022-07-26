<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">
			<?php
				if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) )
				{
					echo '<strong>' . session( 'name' ) . '</strong>';
				}
			?>
		</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="/">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Interface
	</div>


	<!-- Nav Item - Pages Collapse Menu -->

	<li class="nav-item">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#headingOne" aria-expanded="true"
			aria-controls="headingOne">
			<i class="fas fa-fw fa-cog"></i>
			<span>Patient</span>
		</a>
		<div id="headingOne" class="collapse" aria-labelledby="headingOne"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item active" href="{{ route('patient_registration_form') }}">Add New</a>
				<a class="collapse-item" href="{{ route('patient_list') }}">List</a>
			</div>
		</div>
	</li>

	


	<li class="nav-item">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Doctor</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item active" href="{{ route('doctor_registration_form') }}">Add New</a>
				<a class="collapse-item" href="{{ route('doctor_list') }}">List</a>
			</div>
		</div>
	</li>

	<li class="nav-item active">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
			aria-controls="collapseThree">
			<i class="fas fa-fw fa-cog"></i>
			<span>Notice</span>
		</a>
		<div id="collapseThree" class="collapse" aria-labelledby="collapseThree"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item active" href="{{ route('notice_added_form') }}">Add New</a>
				<a class="collapse-item" href="{{ route('notice_list') }}">List</a>
			</div>
		</div>
	</li>

	<li class="nav-item active">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
			aria-controls="collapseThree">
			<i class="fas fa-fw fa-cog"></i>
			<span>Invoice</span>
		</a>
		<div id="collapseThree" class="collapse show" aria-labelledby="collapseThree"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item active" href="{{ route('invoice_added_form') }}">Add New</a>
				<a class="collapse-item" href="{{ route('invoice_list') }}">List</a>
			</div>
		</div>
	</li>


	<li class="nav-item">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#headingFour" aria-expanded="true"
			aria-controls="headingFour">
			<i class="fas fa-fw fa-cog"></i>
			<span>Appointment</span>
		</a>
		<div id="headingFour" class="collapse" aria-labelledby="headingFour"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item active" href="{{ route('appointment_registration_form') }}">Add New</a>
				<a class="collapse-item" href="{{ route('appointment_list') }}">List</a>
			</div>
		</div>
	</li>

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
