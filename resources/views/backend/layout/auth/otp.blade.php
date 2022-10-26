@include('backend.layout.inc.header_authentication')

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
									<h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
									@if(session('status'))
									<div class="alert alert-info">
										{{ session('status') }}
									</div>
									@endif				
								</div>
								<form method="post" action="{{ route('otp_verify') }}" >
									@csrf

									<div class="form-group">
										<label for="otp"> Otp Code</label>
										<input type="text" name="otp" class="form-control form-control-user" required />
									</div>

									<div class="form-group">
										<label for="password"> New Password </label>
										<input type="password" name="password" class="form-control form-control-user" placeholder="New Password" required />
									</div>

									<div class="form-group">
										<label for="passwordConfirmation">  Password Confirmation</label>
										<input type="password" name="passwordConfirmation" class="form-control form-control-user" placeholder="Password Confirmation" required />
										<input type="hidden" name="phone" value="{{ session('phoneVerifyOtp') }}" required />
									</div>

									<button type="submit" class="btn btn-primary"> Verify OTP</button>

								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="forgot-password.html">Back To Login</a>
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