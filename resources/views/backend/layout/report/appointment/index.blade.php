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
			{{--  appointment List  Start   --}}
			<!-- DataTales Example -->
			<div class="card shadow mb-4">

				<div class="card-body">
					<div class="table-responsive">
						
						<div class="row">
						
							<div class="col-md-12">
							<h1 class="h3 mb-4 text-gray-800"> Appointment Report</h1>
				<form method="GET" action="{{ route('appoinment_report_filter') }}">
				<!-- @csrf -->
					<div class="row">
						<div class="col">
							<input type="date" name="start_date" class="form-control"   value="<?php if( !empty($_GET['start_date'])) { echo $_GET['start_date']; } ?>"  placeholder="From" >
						</div>
						<div class="col">
							<input type="date" name="end_date" class="form-control"   value="<?php if( !empty($_GET['end_date'])) { echo $_GET['end_date']; } ?>"  placeholder="To">
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
				Total Appointment Number  :
				<strong> {{ $data['total_appointment'] }} </strong>
			</h3>
							</div>
						</div>

						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Date/Time</th>
									<th>Gender</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Date/Time</th>
									<th>Gender</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach( $data['appointments'] as $appointment )
									<tr>
										<td>{{ $appointment->id }}</td>
										<td>{{ $appointment->name }}</td>
										<td>{{ $appointment->patient_phone }}</td>
										<td>Date: {{ $appointment->date }} / Time:  {{ $appointment->time }}</td>
										<td>{{ $appointment->gender }}</td>
										<td>
											<a class="btn btn-xs btn-info" href="{{ route('appointment_show', $appointment->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-xs btn-success" href="{{ route('appointment_edit', $appointment->id) }}"><i class="fa fa-edit"></i></a>
                                            <!-- <a class="btn btn-xs btn-danger" onclick="return confirm(' Are You Sure To Delete')" href="{{ route('appointment_delete', $appointment->id) }}"><i class="fa fa-trash"></i></a> -->
										</td>
									</tr
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>

			{{--  appointment List  Start   --}}

		</div>
	</div>

</div>

@endsection
