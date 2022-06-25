@extends('backend.home')

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Add New Invoice</h1>
	<script src="{{ asset('js/invoice.js')}}"></script>
	<script src="{{ asset('js/services.js')}}"></script>
	<script src="{{ asset('js/custom.js')}}"></script>

	<div class="row">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		<div class="col-md-12">
			{{--  Doctor Registration Form Start   --}}
			<form action="{{ route('invoice_added_save') }}"  class="form-vertical" method="post">
				@csrf
				<div class="panel-body">

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group row">
								<label for="patient_id" class="col-sm-5">Phone Number <i class="text-danger">*</i></label>
								<div class="col-sm-7">
									<input  autocomplete="off"  id="patient_id" class="form-control" type="number">
									<span id="csc" class="text-center invlid_patient_id">Search With Phone Number</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="patient_phone" class="col-sm-5">Phone Number <i class="text-danger">*</i></label>
								<div class="col-sm-7">
									<input required  name="patient_phone" id="patient_phone" class="form-control" type="text">
								</div>
							</div>
							<div class="form-group row">
								<label for="customer_name" class="col-sm-5">Patient Name <i class="text-danger">*</i></label>
								<div class="col-sm-7">
									<input required="" name="patient_name" id="patient_name" class="form-control" type="text">
								</div>
							</div>
							<div class="form-group row">
								<label for="patient_address" class="col-sm-5">Address <i class="text-danger">*</i></label>
								<div class="col-sm-7">
									<input required="" name="patient_address" id="patient_address"  class="form-control" type="text">
								</div>
							</div>
							<input type="hidden" name="patient_id" id="patient_id_set" onchange="patientID();">
							<input type="hidden" name="isRegistered" id="isRegistered" value="No">
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
							<tbody id="addinvoiceItem">

								<tr>

									<td>
										<input
											name="product_name[]"
											onkeypress="invoice_productList(1);"
											class="form-control productSelection"
											placeholder="Service Name"
											required=""
											id="product_name"
											type="text"
										/>
										<input
											class="autocomplete_hidden_value product_id_1"
											name="product_id[]"
											id="SchoolHiddenId"
											type="hidden"
										/>
										<input class="baseUrl" value="{{ URL::to('/'); }}" type="hidden">
									</td>
									<td>
										<input
											name="product_quantity[]"
											onkeyup="quantity_calculate(1);"
											onchange="quantity_calculate(1);"
											id="total_qntt_1"
											class="form-control text-right"
											value="1"
											min="1"
											type="number"
										/>
									</td>

									<td>
										<input
											name="product_rate[]"
											readonly=""
											value="0.00"
											id="price_item_1"
											class="price_item1 form-control text-right"
											type="text"
										/>
									</td>

									<!-- Discount -->
									<td>
										<input
											name="discount[]"
											onkeyup="quantity_calculate(1);"
											onchange="quantity_calculate(1);"
											id="discount_1"
											class="form-control text-right"
											placeholder="Discount"
											value="0.00"
											min="0"
											type="number"
										/>
									</td>
								   
									<td>
										<input
											class="total_price form-control text-right"
											name="total_price[]"
											id="total_price_1"
											value="0.00"
											tabindex="-1"
											readonly="readonly"
											type="text"
										/>
									</td>

									 <td>
										<!-- Tax calculate start-->
										<input id="total_tax_1" class="total_tax_1" name="service_total_tax[]" value="0.00"  type="hidden">
										<input id="all_tax_1" class=" total_tax" name="service_all_tax[]" value="0.00" type="hidden">
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

							</tbody>
							<tfoot>
								<tr>
									<td colspan="4"><b>Total Tax:</b></td>
									<td class="text-right">
										<input id="total_tax_ammount" tabindex="-1" class="form-control text-right" name="total_tax" value="0.00" readonly="readonly" type="text">
									</td>
								</tr>

								<tr>
									<td colspan="4"><b>Grand Total:</b></td>
									<td class="text-right">
										<input id="grandTotal" tabindex="-1" class="form-control text-right" name="grand_total_price" value="0.00" readonly="readonly" type="text">
									</td>
								</tr>

								<tr>
									
									<td colspan="4"><b>Paid Ammount:</b></td>
									<td class="text-right">
										<input id="paidAmount" onkeyup="invoice_paidamount();" tabindex="-1" class="form-control text-right" name="paid_amount" value="0.00" type="text">
									</td>
								</tr>

								<tr>
									<td align="center">
										<input id="add-invoice-item" class="btn btn-info" name="add-invoice-item" onclick="addInputField('addinvoiceItem');" value="Add New Service" type="button">
										<input name="baseUrl" class="baseUrl" value="{{ URL::to('/'); }}" type="hidden">
									</td>
									<td colspan="3"><b>Due:</b>  
										<select name="isClose" >
											<option value="">-Due Status-</option>
											<option value="0">Close</option>
											<option value="1">Continue</option>
										</select>
										<input type="hidden" name="previous_due" id="previous_due_set" value="0.00"> 
										<bold>Previous Due Was : <span id="previous_due" > </span> <bold>
									</td>
									<td class="text-right">
										<input id="dueAmmount" class="form-control text-right" name="due_amount" value="0.00" readonly="readonly" type="text"> 
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
									<textarea name="payment_note" class="form-control" placeholder="Payment Notes"></textarea>
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
									<textarea name="payment_method_note" class="form-control" placeholder="Payment Method Notes "></textarea>
								</div>
							</div>
						</div>
					</div>
					<input type="hidden" name="last_service_id" id="last_service_id"  value="1"/>
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


