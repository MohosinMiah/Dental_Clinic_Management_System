@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Add New Invoice</h1>
	<script src="{{ asset('js/invoice.js')}}"></script>
	<script src="{{ asset('js/services.js')}}"></script>

	<div class="row">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		<div class="col-md-12">
			{{--  Doctor Registration Form Start   --}}
            <div class="panel panel-bd">
                <div id="printableArea">
                    <div class="panel-body">
                        <div class="row">
                                
                            <div class="col-sm-8">
                                <img src="https://newclinic365.bdtask.com/new/./assets/uploads/images/2docto1.png" class="img img-responsive" alt="">
                                    <br>
                                    <span class="label label-success-outline m-r-15 p-10">Billing From</span>
                                    <address>
                                        <strong>Address</strong>
                                           {{ $data['invoice']->patient_address }}<br>
                                        <abbr>Phone Number:</abbr> {{ $data['invoice']->patient_phone }}<br>
                                        <abbr>Email Address:</abbr> 
                                        {{ $data['invoice']->patient_phone }}<br>
                                    </address>
                                </div>
                                
                                <div class="col-sm-4 text-left">                                   
                                    <div>Invoice No: {{ $data['invoice']->id }}</div>
                                    <div class="m-b-15">{{ $data['invoice']->payment_date }}</div>

                                    <span class="label label-success-outline m-r-15">Billing To</span>

									<address>  
										<strong> </strong><br>
										<strong>Address</strong>
										<p>
											{{ $data['invoice']->patient_address }}
										</p>
										<abbr>Phone Number: </abbr>
										{{ $data['invoice']->patient_phone }}
											<br>
										<abbr>Email Address:</abbr> 
										{{ $data['invoice']->patient_phone }}
									</address>
                                </div>
                            </div> <hr>

                            <div class="table-responsive m-b-20">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL NO.</th>
                                            <th>Service Name</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <th>Discount</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>

                                    <tbody>

										@foreach ($data['invoiceDetails'] as $invoiceDetail )
                                        <tr>
                                            <td>2</td>
                                            <td><div><strong>{{ $invoiceDetail->service_name }}</strong></div></td>
                                            <td>{{ $invoiceDetail->quantity }}</td>
                                            <td>{{ $invoiceDetail->rate }}</td>
                                            <td>{{ $invoiceDetail->discount }}</td>
                                            <td>{{ $invoiceDetail->total }}</td>
                                        </tr>
										@endforeach

                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="col-sm-8">
                                    </div>

                                    <div class="col-sm-4">

                                        <table class="table">
                                            <tbody>

                                                <tr>
                                                    <th>Tax : </th>
                                                    <td>{{ $data['invoice']->tax_total }}</td> </td>
                                                </tr>
                                                <tr>
                                                    <th class="grand_total">Grand Total :</th>
                                                    <td class="grand_total">{{ $data['invoice']->grand_total }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Paid Ammount: </th>
                                                    <td>{{ $data['invoice']->paid_amount }}</td>
                                                </tr>                
                                                <tr>
                                                    <th>Due : </th>
                                                    <td>{{ $data['invoice']->due_total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div>Authorised By </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="panel-footer text-left">
                        <a class="btn btn-info" href="#" onclick="printContent('printableArea')"><span class="fa fa-print"></span></a>
                    </div>
                </div>
			{{--  Doctor Registration Form Start   --}}

		</div>
	</div>

</div>

@endsection
