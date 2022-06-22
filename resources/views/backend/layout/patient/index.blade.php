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
									<th>Name</th>
									<th>Phone</th>
									<th>Registered</th>
									<th>Age</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Name</th>
									<th>Phone</th>
									<th>Registered</th>
									<th>Age</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach( $data['patients'] as $patient )
									<tr>
										<td>{{ $patient->name }}</td>
										<td>{{ $patient->phone }}</td>
										<td>{{ date('d-m-Y', strtotime( $patient->created_at  )) }}</td>
										<td>{{ $patient->age }}</td>
										<td>
                                            <a class="btn btn-xs btn-success" href="{{ route('patient_edit', $patient->id) }}"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-xs btn-danger" onclick="return confirm(' Are You Sure To Delete')" href="{{ route('patient_delete', $patient->id) }}"><i class="fa fa-trash"></i></a>
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
