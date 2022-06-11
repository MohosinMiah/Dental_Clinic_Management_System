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
		<div class="col-sm-12">
			<div class="panel panel-bd">

				<div class="panel-heading no-print">
					<div class="btn-group"> 
						<a class="btn btn-success pull-right text-white" href="https://newclinic365.bdtask.com/new/admin/Invoice"> <i class="fa fa-plus"></i> Add New Invoice </a>  
						
					</div>
				</div> 
	 
			   


				<div class="panel-body">
					<table class="datatable table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" width="100%">
						<thead>
							<tr role="row">
								<th>SL NO</th>
								<th>Invoice Id</th>
								<th>Patient Name</th>
								<th>Grand Total</th>
								<th>Paid</th>
								<th>Due</th>
								<th>Date </th>
								<th>Action</th>
							</tr>
						</thead>
						@foreach ( $data['invoices'] as $key=>$invoice )
						<tbody> 
								<tr>
									<td>1</td>
									<td>{{ $invoice->id }}</td>
									<td>{{ $invoice->patient_name }}</td>
									<td>{{ $invoice->grand_total }}</td>
									<td>{{ $invoice->paid_amount }}</td>
									<td>{{ $invoice->due_total }}</td>
									<td>{{ $invoice->payment_date }}</td>
									<td class="center">
										<a href="{{ route('single_view_invoice',$invoice->id) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
										<a href="{{ route('single_edit_invoice',$invoice->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
										<a href="{{ route('single_delete_invoice',$invoice->id) }}"  class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
									</td>
								</tr>
						</tbody>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection
