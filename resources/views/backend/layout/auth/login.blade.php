	@include('backend.layout.inc.header')
	<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
										@if(session('status'))
										<div class="alert alert-success">
											{{ session('status') }}
										</div>
									@endif
									</div>
									<form method="post" action="{{ route('login_check') }}" >
										@csrf
										<div class="form-group">
											<input type="text" name="phone" class="form-control form-control-user" id="exampleInputPhone" aria-describedby="PhoneHelp" placeholder="Enter Phone Number...">
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" />
										</div>
										<button type="submit" class="btn btn-primary">Login</button> 
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="{{ route( 'forgot_form' ) }}">Forgot Password?</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>



	</body>
	@include('backend.layout.inc.footer')