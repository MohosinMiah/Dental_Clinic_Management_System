@extends('backend.home')

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

<script>
	// dataTable in asc order
	$(document).ready(function() {
		$('#dataTableAppointment').DataTable( {
			"order": [[ 0, "asc" ]]
		} );
	} );
</script>
@endsection

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-md-12">
			<h3 class="text text-info"> Appointment List</h3>
			<a href="{{ route('appointment_registration_form') }}" class="btn btn-info" style="margin-bottom: 10px;"> Add Appointment </a>

				<form method="GET" action="{{ route('appoinment_report_filter_appointment') }}">
				<!-- @csrf -->
					<div class="row">
						<div class="col">
							<label>From</label>
							<input type="date" name="start_date" class="form-control"   value="<?php if( !empty($_GET['start_date'])) { echo $_GET['start_date']; }else{ echo $data['startDate']; } ?>"  placeholder="From" >
						</div>
						<div class="col">
							<label>To</label>
							<input type="date" name="end_date" class="form-control"   value="<?php if( !empty($_GET['end_date'])) { echo $_GET['end_date']; }else{ echo $data['endDate']; } ?>"  placeholder="To">
						</div>
					</div>
					<div class="row">
						<div class="col">
							<input  type="submit" value="Filter">
						</div>
					</div>
				</form>
			<br>
			<?php if( !empty($_GET['start_date']) ) ?>
			<p class="text-danger">By Default One Week Appointment List Will Display.<strong>Please chage Date Filter For More Appointments</strong> </p>
			<h3>
				Total Appointment Number  :
				<strong> {{ $data['total_appointment'] }} </strong>
			</h3>
							</div>
						</div>

							<table class="table table-bordered" id="dataTableAppointment" width="100%" cellspacing="0">
								
								<thead>
									<tr>
										<th>SN</th>
										<th>Name</th>
										<th>Phone</th>
										<th>Date</th>
										<th>Time</th>
										<th>Gender</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>SN</th>
										<th>Name</th>
										<th>Phone</th>
										<th>Date</th>
										<th>Time</th>
										<th>Gender</th>
										<th>Action</th>
									</tr>
								</tfoot>
								<tbody>
								    <?php $i = 1;?>
									@foreach( $data['appointments'] as $appointment )
										<tr>
											<td>{{ $i++ }}</td>
											<td>{{ $appointment->name }}</td>
											<td>{{ $appointment->patient_phone }}</td>
											<td>{{ $appointment->date }}</td>
											<td>{{$appointment->time}}</td>
											<td>{{ $appointment->gender }}</td>
											<td>
												<a class="btn btn-xs btn-info" href="{{ route('appointment_show', $appointment->id) }}"><i class="fa fa-eye"></i></a>
												<a class="btn btn-xs btn-success" href="{{ route('appointment_edit', $appointment->id) }}"><i class="fa fa-edit"></i></a>
										
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
