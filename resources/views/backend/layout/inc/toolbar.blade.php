<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">

		<!-- Sidebar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>

	<!-- Topbar Search -->
	{{--  <form
		class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
		<div class="input-group">
			<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
				aria-label="Search" aria-describedby="basic-addon2">
			<div class="input-group-append">
				<button class="btn btn-primary" type="button">
					<i class="fas fa-search fa-sm"></i>
				</button>
			</div>
		</div>
	</form>  --}}
	
		<?php
		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) )
		{
			echo '<h3>User Name : ' . session( 'name' ) . '</h3>';
		}
		?>
	

	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">

		<!-- Nav Item - Search Dropdown (Visible Only XS) -->
		<li class="nav-item dropdown no-arrow d-sm-none">
			<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
				data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-search fa-fw"></i>
			</a>
			<!-- Dropdown - Messages -->
			<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
				aria-labelledby="searchDropdown">
				<form class="form-inline mr-auto w-100 navbar-search">
					<div class="input-group">
						<input type="text" class="form-control bg-light border-0 small"
							placeholder="Search for..." aria-label="Search"
							aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn btn-primary" type="button">
								<i class="fas fa-search fa-sm"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</li>

		<!-- Nav Item - Alerts -->
		<li class="nav-item dropdown no-arrow mx-1">
			<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
				data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-bell fa-fw text-danger" ></i>
				<!-- Counter - Alerts -->
				<span class="badge badge-danger badge-counter" tooltip="Latest Appointments"></span>
			</a>
			<!-- Dropdown - Alerts -->
			<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
				aria-labelledby="alertsDropdown">
				<h6 class="dropdown-header">
					Latest Appointments
				</h6>
				<?php 
				$appointments = DB::table('appointments')->orderBy('id','DESC')->limit(5)->get();
				foreach( $appointments as $appointment )
				{
					?>
					<a class="dropdown-item d-flex align-items-center" href="{{ route( 'appointment_show', $appointment->id ) }}">
						<div class="mr-3">
							<div class="icon-circle bg-primary">
								<i class="fas fa-file-alt text-white"></i>
							</div>
						</div>
						<div>
							<div class="small text-gray-500">{{ $appointment->date }}</div>
							<span class="font-weight-bold">{{ $appointment->name }}</span>
						</div>
					</a>
					<?php
				}
				?>
				<a class="dropdown-item text-center small text-gray-500" href="{{ route('appointment_list') }}">Show All Alerts</a>
			</div>
		</li>

		

		<div class="topbar-divider d-none d-sm-block"></div>

		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">

			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
				data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 small">
					<?php
					if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) )
					{
						echo session( 'name' );
					}
					?>
				</span>
				<img class="img-profile rounded-circle"
					src="img/undraw_profile.svg">
			</a>

			<!-- Dropdown - User Information -->
			<div
				class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
				aria-labelledby="userDropdown"
			>

				<a class="dropdown-item" href="{{ route( 'profile' ) }}">
					<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
					Profile
				</a>

				<a class="dropdown-item" href="{{ route( 'settings') }}">
					<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
					Settings
				</a>

				<div class="dropdown-divider"></div>
			
				<a class="dropdown-item" href="{{ route('logout') }}" >
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			
			</div>
		</li>

	</ul>

</nav>
<!-- End of Sidebar -->

<!-- Begin Page Content -->
<div class="container-fluid">