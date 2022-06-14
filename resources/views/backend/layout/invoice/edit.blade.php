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
			<form action="{{ route('invoice_update' , $data['invoice']->id ) }}"  class="form-vertical" method="post">
				@csrf
				<div class="panel-body">

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group row">
								<label for="customer_name" class="col-sm-5">Phone Number <i class="text-danger">*</i></label>
								<div class="col-sm-7">
									<input required="" autocomplete="off" name="patient_phone" id="phone" class="form-control" value="{{ $data['invoice']->patient_phone }}" type="number">
									<span id="csc" class="text-center invlid_patient_id">Phone Number</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="customer_name" class="col-sm-5">Patient Name <i class="text-danger">*</i></label>
								<div class="col-sm-7">
									<input required="" name="patient_name" id="patient_name" class="form-control" value="{{ $data['invoice']->patient_name }}" type="text">
								</div>
							</div>
							<div class="form-group row">
								<label for="customer_name" class="col-sm-5">Address <i class="text-danger">*</i></label>
								<div class="col-sm-7">
									<input required="" name="patient_address" id="patient_address"  class="form-control" value="{{ $data['invoice']->patient_address }}" type="text">
								</div>
							</div>
							<input type="hidden" name="patient_id" id="patient_id">

						</div>
					  
						<div class="col-md-6">
							<div class="form-group row">
								<label for="date" class="col-sm-4 col-form-label">Date <i class="text-danger">*</i></label>
								<div class="col-sm-8">
									   <input class="form-control" size="50" name="payment_date" id="payment_date" required="" value="2022-06-06" type="text">
								</div>
							</div>

							<div class="form-group row">
								<label for="date" class="col-sm-4 col-form-label">Doctor<i class="text-danger">*</i></label>
								<div class="col-sm-8">
									<select name="doctor_id" class=" form-control" required="">
										<option value="">Doctor</option>
										<option value="7">Adword Lewis</option>
										<option value="8">Jenifer Nelson</option>
										<option value="9">Robinson Walker</option>
										<option value="10">Alice  Jessica</option>
										<option value="11">Clarke Jackson</option>
										<option value="12">Eliza Freya </option>
										<option value="17">Nicolas Juliea </option>
									</select>
								</div>
							</div>
						</div>
					</div>



					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="normalinvoice">
							<thead>
								<tr>
									<th class="text-center">Service Info <i class="text-danger">*</i></th>
									
									<th class="text-center">Quantity <i class="text-danger">*</i></th>
									<th class="text-center">Price <i class="text-danger">*</i></th>
									<th class="text-center">Discount </th>
									<th class="text-center">Total <i class="text-danger">*</i></th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<?php 
							$totalInvoice =  count( $data['invoiceDetails'] );
							?>
							@foreach( $data['invoiceDetails'] as $i=>$invoiceDetail )
							
							<tbody id="addinvoiceItem">
								<tr>
									<h1>{{ $i + 1 }}
									<td>
										<input
											name="product_name[]"
											onkeypress="invoice_productList( {{ $i + 1 }} );"
											class="form-control productSelection"
											placeholder="Service Name"
											value="{{ $invoiceDetail->service_name }}"
											required=""
											id="product_name"
											type="text"
										/>
										<input
											class="autocomplete_hidden_value product_id_{{ $i + 1 }}"
											name="product_id[]"
											id="SchoolHiddenId"
											type="hidden"
											value="{{ $invoiceDetail->service_id }}"
										/>
										<input class="baseUrl" value="{{ URL::to('/'); }}" type="hidden">
									</td>
									<td>
										<input
											name="product_quantity[]"
											onkeyup="quantity_calculate( {{ $i + 1 }} ); "
											onchange="quantity_calculate( {{ $i + 1 }} );"
											id="total_qntt_{{ $i + 1 }}"
											class="form-control text-right"
											value="{{ $invoiceDetail->quantity }}"
											min="1"
											type="number"
										/>
									</td>

									<td>
										<input
											name="product_rate[]"
											readonly=""
											value="{{ $invoiceDetail->rate }}"
											id="price_item_{{ $i + 1 }}"
											class="price_item{{ $i + 1 }} form-control text-right"
											type="text"
										/>
									</td>

									<!-- Discount -->
									<td>
										<input
											name="discount[]"
											onkeyup="quantity_calculate( {{ $i + 1 }} );"
											onchange="quantity_calculate( {{ $i + 1 }} );"
											id="discount_{{ $i + 1 }}"
											class="form-control text-right"
											placeholder="Discount"
											value="{{ $invoiceDetail->discount }}"
											min="0"
											type="number"
										/>
									</td>
								   
									<td>
										<input
											class="total_price form-control text-right"
											name="total_price[]"
											id="total_price_{{ $i + 1 }}"
											value="{{ $invoiceDetail->total }}"
											tabindex="-1"
											readonly="readonly"
											type="text"
										/>
									</td>

									 <td>
										<!-- Tax calculate start-->
										<input id="total_tax_{{ $i + 1 }}" class="total_tax_{{ $i + 1 }}" name="service_total_tax[]"  value="{{ $invoiceDetail->service_total_tax }}" type="hidden">
										<input id="all_tax_{{ $i + 1 }}" class=" total_tax" name="service_all_tax[]" value="{{ $invoiceDetail->service_all_tax }}" type="hidden">
										<!-- Tax calculate end -->
										
										<button
											class="btn btn-danger"
											type="button"
											value="Delete"
											onclick="deleteRow(this)"
										>
											Delete

										</button>
									</td>

								</tr>
								<?php 
								if( ++$i === $totalInvoice )
								{
								?>
									<input type="hidden" id="last_service_id" value="{{ $i }}" >
								<?php
								}
								?>


							</tbody>
							@endforeach
							<tfoot>
								<tr>
									<td colspan="4"><b>Total Tax:</b></td>
									<td class="text-right">
										<input id="total_tax_ammount" tabindex="-1" class="form-control text-right" name="total_tax" value="{{ $data['invoice']->tax_total }} " readonly="readonly" type="text">
									</td>
								</tr>

								<tr>
									<td colspan="4"><b>Grand Total:</b></td>
									<td class="text-right">
										<input id="grandTotal" tabindex="-1" class="form-control text-right" name="grand_total_price" value="{{ $data['invoice']->grand_total }}" readonly="readonly" type="text">
									</td>
								</tr>

								<tr>
									
									<td colspan="4"><b>Paid Ammount:</b></td>
									<td class="text-right">
										<input id="paidAmount" onkeyup="invoice_paidamount();" tabindex="-1" class="form-control text-right" name="paid_amount" value="{{ $data['invoice']->paid_amount }}" type="text">
									</td>
								</tr>

								<tr>
									<td align="center">
										<input id="add-invoice-item" class="btn btn-info" name="add-invoice-item" onclick="addInputField('addinvoiceItem');" value="Add New Service" type="button">
										<input name="baseUrl" class="baseUrl" value="{{ URL::to('/'); }}" type="hidden">
									</td>
									<td colspan="3"><b>Due:</b></td>
									<td class="text-right">
										<input id="dueAmmount" class="form-control text-right" name="due_amount" value="{{ $data['invoice']->due_total }}" readonly="readonly" type="text">
									</td>
								</tr>

							</tfoot>
						</table>
					</div>

					<div class="row">
						<div class="col-md-8">

							<div class="form-group row">
								<label for="date" class="col-sm-4 col-form-label">Payment Notes</label>
								<div class="col-sm-8">
									<textarea name="payment_note" class="form-control" placeholder="Payment Notes">
										{{ $data['invoice']->payment_note }}
									</textarea>
								</div>
							</div>

							<div class="form-group row">
								<label for="date" class="col-sm-4 col-form-label">Select payment method </label>
								<div class="col-sm-8">
									<select name="payment_method" class=" form-control">
										<option value="">-Select-</option>
										<option value="master_card">Master Card</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label for="date" class="col-sm-4 col-form-label">Payment Method Notes  </label>
								<div class="col-sm-8">
									<textarea name="payment_method_note" class="form-control" placeholder="Payment Method Notes ">
										{{ $data['invoice']->payment_method_note }}
									</textarea>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-offset-4 col-sm-4">
							<input type="submit"  class="btn btn-success"  value="Save And Paid" type="button" >
						</div>
					</div>


				</div>
			</form>
			{{--  Doctor Registration Form Start   --}}

		</div>
	</div>


</div>

@endsection
