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
	<h3 class="text text-info">Invoice List</h3>
	<a href="{{ route('invoice_added_form') }}" class="btn btn-info" style="margin-bottom: 10px;"> Add New Invoice</a>

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
									<th>SN</th>
									<th>Patient Name</th>
									<th>Grand Total</th>
									<th>Paid</th>
									<th>Due</th>
									<th>IsClose</th>
									<th>Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>SN</th>
									<th>Patient Name</th>
									<th>Grand Total</th>
									<th>Paid</th>
									<th>Due</th>
									<th>IsClose</th>
									<th>Date</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
							    <?php $i = 1;?>
								@foreach( $data['invoices'] as $invoice )
									<tr>
										<td>{{ $i++ }}</td>
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
										<td>{{ date('d-m-Y', strtotime( $invoice->payment_date  )) }}</td>
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

			{{--  Doctor List  Start   --}}

		</div>
	</div>

</div>

@endsection
