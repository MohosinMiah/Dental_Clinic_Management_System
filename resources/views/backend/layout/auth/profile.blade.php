@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Profile Settings</h1>

	<div class="row">
		<div class="row">
			@if(session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
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
			<?php
			
			$authorID = session('authorID');
			$author  = DB::table( 'authentications' )->where( 'id', $authorID )->first();
			
			?>
		<div class="col-md-12">
			{{--  Doctor Registration Form Start   --}}
			<form method="post" action="{{ route('notice_added_save') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name"> Name {{ session('authorID') }} ||  {{ session('name') }}  </label>
					<input type="text" name="name" id="name"  required class="form-control"  value="{{ $author->name }}" required />
				</div>


				<div class="form-group">
					<label for="profile_pic"> profile_pic   </label>
					<input type="file" name="profile_pic" id="profile_pic"  required class="form-control" />
					<img src="/images/{{ $author->profile_pic }}" alt="User Profile Pic" width="250" height="150" />
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			{{--  Doctor Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
