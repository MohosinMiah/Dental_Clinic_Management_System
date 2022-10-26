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
	<h1 class="h3 mb-4 text-gray-800"> Doctor List</h1>

	<div class="row">
		<div class="col-md-12">
			{{--  Doctor List  Start   --}}
			<!-- DataTales Example -->
			<div class="card shadow mb-4">

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Department</th>
									<th>Gender</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Department</th>
									<th>Gender</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach( $data['doctors'] as $doctor )
									<tr>
										<td>{{ $doctor->id }}</td>
										<td>{{ $doctor->name }}</td>
										<td>{{ $doctor->phone }}</td>
										<td>{{ $doctor->department }}</td>
										<td>{{ $doctor->gender }}</td>
										<td>
											<a class="btn btn-xs btn-info" href="{{ route('doctor_show', $doctor->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-xs btn-success" href="{{ route('doctor_edit', $doctor->id) }}"><i class="fa fa-edit"></i></a>
                                            <!-- <a class="btn btn-xs btn-danger" onclick="return confirm(' Are You Sure To Delete')" href="{{ route('doctor_delete', $doctor->id) }}"><i class="fa fa-trash"></i></a> -->
										</td>
									</tr
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>

			{{--  Doctor List  Start   --}}

		</div>
	</div>

</div>

@endsection
