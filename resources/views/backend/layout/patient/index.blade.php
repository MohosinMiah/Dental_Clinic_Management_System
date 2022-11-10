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
	<!-- Page Heading -->
	<h3 class="text text-info">Patient List</h3>
	<a href="{{ route('patient_registration_form') }}" class="btn btn-info" style="margin-bottom: 10px;"> Add New Patient</a>
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
									<th>Registered</th>
									<th>Age</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Phone</th>
									<th>Registered</th>
									<th>Age</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach( $data['patients'] as $patient )
									<tr>
										<td>{{ $patient->id }}</td>
										<td><a href='{{ route("patient_service_history", $patient->id ) }}'> {{ $patient->name }} </a></td>
										<td>{{ $patient->phone }}</td>
										<td>{{ date('d-m-Y', strtotime( $patient->created_at  )) }}</td>
										<td>{{ $patient->age }}</td>
										<td>
											<a class="btn btn-xs btn-info" href="{{ route('patient_show', $patient->id) }}"><i class="fa fa-eye"></i></a>
											<a class="btn btn-xs btn-success" href="{{ route('patient_edit', $patient->id) }}"><i class="fa fa-edit"></i></a>

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
