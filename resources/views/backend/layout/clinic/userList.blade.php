@extends('backend.home')

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

@endsection

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-md-12">
		<h1 class="h3 mb-4 text-gray-800"> User List</h1>
		<a href="{{ route('add_new_user') }}" class="btn btn-info">Add User</a>
		<a href="{{ route( 'user_list' ) }}" class="btn btn-success"> User List</a>
		<a href="{{ route( 'clinic_info' ) }}" class="btn btn-danger"> Clinic Info  Setting</a>
		<br>
		<br>
			{{--  User List  Start   --}}
			<h3 class="text text-info">User List</h3>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Created At</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Created At</th>
							<th>Action</th>
						</tr>
						</tr>
					</tfoot>
					<tbody>
						@foreach( $data['users'] as $user )
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->phone }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ date('d-m-Y', strtotime( $user->created_at )); }} </td>
								<td>
								
									<a class="btn btn-xs btn-success" href="{{ route( 'clinic_user_edit', $user->id) }}"><i class="fa fa-edit"></i></a>
								
								</td>
							</tr
						@endforeach

					</tbody>
				</table>
			{{--  User List  End   --}}

		</div>
	</div>

</div>

@endsection
