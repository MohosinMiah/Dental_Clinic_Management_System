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
			{{--  Doctor List  Start   --}}
			<!-- DataTales Example -->
			<div class="card shadow mb-4">

				<div class="card-body">
								<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"> Patient Report</h1>
			<form method="GET" action="{{ route('patient_report_filter') }}">
			<!-- @csrf -->
				<div class="row">
					<div class="col">
						<input type="date" name="start_date" class="form-control" value="<?php if( !empty($_GET['start_date'])) { echo $_GET['start_date']; } ?>"  placeholder="From" >
					</div>
					<div class="col">
						<input type="date" name="end_date" class="form-control" value="<?php if( !empty($_GET['end_date'])) { echo $_GET['end_date']; } ?>" placeholder="To">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<input  type="submit" value="Filter">
					</div>
				</div>
			</form>

			<br>
			<h3>
				Total Patient Number  :
				<strong> {{ $data['total_patient'] }} </strong>
			</h3>


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
										<td><a href='{{ route("patient_service_history", $patient->id ) }}'>{{ $patient->name }} </a></td>
										<td>{{ $patient->phone }}</td>
										<td>{{ date('d-m-Y', strtotime( $patient->created_at  )) }}</td>
										<td>{{ $patient->age }}</td>
										<td>
											<a class="btn btn-xs btn-info" href="{{ route('patient_show', $patient->id) }}"><i class="fa fa-eye"></i></a>
											<a class="btn btn-xs btn-success" href="{{ route('patient_edit', $patient->id) }}"><i class="fa fa-edit"></i></a>
											<!-- <a class="btn btn-xs btn-danger" onclick="return confirm(' Are You Sure To Delete')" href="{{ route('patient_delete', $patient->id) }}"><i class="fa fa-trash"></i></a> -->
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
