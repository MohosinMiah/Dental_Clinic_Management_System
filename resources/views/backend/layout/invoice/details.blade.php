@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
    <h3 class="text text-info">Invoice Details</h3>
	<a href="{{ route('invoice_list') }}" class="btn btn-info" style="margin-bottom: 10px;"> Invoice List</a>

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
                                <img src="/images/fcdz.jpg" class="img img-responsive" alt="Family Care Dental Zone" height="100" width="100">
                                    <br>
                                    <span class="label label-success-outline m-r-15">Billing From</span>
                                    <address>
                                        <strong>Address</strong>
                                        Uttara, Sector 10, Road 12, House 24
                                        <br>
                                        <abbr>Phone Number:</abbr> 01682 683811<br>
                                        <abbr>Email Address:</abbr> 
                                        familicaredental@gmail.com
                                        <br>
                                    </address>
                                </div>
                                
                                <div class="col-sm-4 text-left">                                   
                                    <div>Invoice No: {{ $data['invoice']->id }}</div>
                                    <div class="m-b-15">{{ $data['invoice']->payment_date }}</div>
                                    <strong>Doctor : </strong>
                                        {{ $data['doctor']->name }}
                                        <br>
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
                                        <?php $i = 0; ?>
										@foreach ($data['invoiceDetails'] as $invoiceDetail )
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
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
                                                    <th>Previous Due : </th>
                                                    <td>{{ $data['invoice']->previous_due }}</td> </td>
                                                </tr>

                                                <tr>
                                                    <th class="grand_total">Discount Amount :</th>
                                                    <td class="grand_total">
                                                        {{ $data['invoice']->decrease }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                    <abbr title="Grand Total = ( Previous Due + Current Services Total Amount ) - Discount Amount ">Grand Total :</abbr>
                                                    </th>
                                                    <td>
                                                        {{  $data['invoice']->grand_total }}
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Paid Ammount: </th>
                                                    <td>{{ $data['invoice']->paid_amount }}</td>
                                                </tr> 

                                                <tr>
                                                    <th>Due : </th>
                                                    <td>{{ $data['invoice']->due_total }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Status : </th>
                                                    <td>
                                                        <p style="color:red;font-weight:bold">{{ $data['invoice']->isClose == 1 ? "Continue" : "Close" }}</p>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <div>Authorised By : fcdzbd.com</div>
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
