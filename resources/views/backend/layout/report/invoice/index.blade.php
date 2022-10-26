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
	<div class="row">
		<div class="col-md-12">
			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"> Invoice Report</h1>
			<form method="GET" action="{{ route('payment_report_filter') }}">
			<!-- @csrf -->
				<div class="row">
					<div class="col">
						<input type="date" name="start_date" class="form-control"  value="<?php if( !empty($_GET['start_date'])) { echo $_GET['start_date']; } ?>"   placeholder="From" >
					</div>
					<div class="col">
						<input type="date" name="end_date" class="form-control"  value="<?php if( !empty($_GET['end_date'])) { echo $_GET['end_date']; } ?>"  placeholder="To">
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
				Total Paid Amount :
				<?php
				echo $data['total_paid_amount'] . ' TK';
				?>
			</h3>

		</div>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="col-md-12">
			{{--  Invoice List  Start   --}}
			<!-- DataTales Example -->
			<div class="card shadow mb-4">

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Invoice Id</th>
									<th>Patient Name</th>
									<th>Grand Total</th>
									<th>Paid</th>
									<th>Due</th>
									<th>IsClose</th>
									<th>Date</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Invoice Id</th>
									<th>Patient Name</th>
									<th>Grand Total</th>
									<th>Paid</th>
									<th>Due</th>
									<th>IsClose</th>
									<th>Date</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach( $data['invoices'] as $invoice )
									<tr>
										<td>{{ $invoice->id }}</td>
										<td>{{ $invoice->patient_name }}</td>
										<td>{{ $invoice->grand_total }}</td>
										<td>{{ $invoice->paid_amount }}</td>
										<td>{{ $invoice->due_total }}</td>
										<td> 
											<?php 
											if( $invoice->isClose == 1)
											{
												echo '<p class="text-info"> <strong>Continue</strong> </p>';
											}
											else
											{
												echo '<p class="text-danger"> <strong>Closed</strong> </p>';

											}
										?>
										</td>
										<td>{{ date('d-m-Y', strtotime( $invoice->created_at  )) }}</td>
									</tr
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>

			{{--  Invoice List  Start   --}}

		</div>
	</div>

</div>

@endsection
