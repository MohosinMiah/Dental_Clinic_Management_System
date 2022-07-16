@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Profile Settings</h1>

	<div class="row">
			<div class="col-md-12">
				@if(session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
			@if(session('error'))
				<div class="alert alert-danger">
					{{ session('error') }}
				</div>
			@endif
	
			@if (Session::has('message'))
				<h4 class="text-info">{!! session('message') !!}</h4>
			@endif
	
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			</div>
			<?php
			
			$authorID = session('authorID');
			$author  = DB::table( 'authentications' )->where( 'id', $authorID )->first();
			
			?>
				<div class="col-md-6">
					{{--  Doctor Registration Form Start   --}}
					<form method="post" action="{{ route( 'profile_setting_update_phone' ) }}"    >
						@csrf
						<div class="form-group">
							{{--  {{ session('authorID') }} ||  {{ session('name') }}  --}}
							<label for="phone">Update Phone Number   </label>
							<input type="text" name="phone" id="phone"   class="form-control"  value="{{ $author->phone }}" required />
						</div>

						<div class="form-group" autocomplete="off">
							<label for="password">Old  Password   </label>
							<input type="password" autocomplete="off"  name="password" id="password" class="form-control"  required/>
						</div>
		
						<button type="submit" class="btn btn-primary">Changed Number</button>
					</form>
					{{--  Doctor Registration Form Start   --}}
		
				</div>
				<div class="col-md-6">
					{{--  Doctor Registration Form Start   --}}
					<form method="post" action="{{ route( 'profile_setting_update_password' ) }}"    >
						@csrf

						<div class="form-group" autocomplete="off">
							<label for="newPassword">New  Password   </label>
							<input type="password" autocomplete="off"  name="newPassword" id="newPassword" class="form-control" required />
						</div>
		
						<div class="form-group" autocomplete="off">
							<label for="oldPassword">Old  Password   </label>
							<input type="password" autocomplete="off"  name="oldPassword" id="oldPassword" class="form-control"  required />
						</div>
		
						<button type="submit" class="btn btn-primary">Changed Password</button>
					</form>
					{{--  Doctor Registration Form Start   --}}
		
				</div>

</div>

@endsection
