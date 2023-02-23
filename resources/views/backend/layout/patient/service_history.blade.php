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
			<a href="{{ route('patient_list') }}" class="btn btn-info" style="margin-bottom: 10px;"> Patient List</a>
			<h3 class="text-left">Details Information For :<strong> {{ $data['patient']->name }} </strong></h3>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#ID</th>
						<th scope="col">Name</th>
						<th scope="col">Phone</th>
						<th scope="col">Total Paid</th>
						<th scope="col">Registered</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row"> {{ $data['patient']->id }} </th>
						<td> {{ $data['patient']->name }} </td>
						<td> {{ $data['patient']->phone }} </td>
						<td> <strong> {{ number_format( $data['total_paid'], 2, '.', ',' ) }} </strong> TK </td>
						<td> {{ $data['patient']->created_at }} </td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<h4 class="text-left">Payment Details</h4>
			<div class="card shadow mb-4">

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>SN</th>
						<th>Grand Total</th>
						<th>Treatement Record</th>
						<th>Paid</th>
						<th>Due</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>SN</th>
						<th>Grand Total</th>
						<th>Treatement Record</th>
						<th>Paid</th>
						<th>Due</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
				    <?php $i = 1;?>
					@foreach( $data['invoices'] as $invoice )
						<tr>
							<td>{{ $i++ }}</td>
							<td>{{ $invoice->grand_total }}</td>
							<td>{{ $invoice->payment_note }}</td>
							<td>{{ $invoice->paid_amount }}</td>
							<td>{{ $invoice->due_total }}</td>
							
								<?php 
								// if( $invoice->isClose == 1)
								// {
								// 	echo '<p class="text-info"> <strong>Continue</strong> </p>';
								// }
								// else
								// {
								// 	echo '<p class="text-danger"> <strong>Closed</strong> </p>';

								// }
							?>
						
							<td>{{ date('d-m-Y', strtotime( $invoice->created_at  )) }}</td>
							<td>
								<a class="btn btn-xs btn-info" href="{{ route('single_view_invoice', $invoice->id) }}"><i class="fa fa-eye"></i></a>
								<a class="btn btn-xs btn-success" href="{{ route('single_edit_invoice', $invoice->id) }}"><i class="fa fa-edit"></i></a>
							
							</td>
						</tr
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
	</div>
		</div>
	</div>

</div>

@endsection
