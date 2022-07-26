<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
// use App\Http\Requests\StoreInvoiceRequest;
// use App\Http\Requests\UpdateInvoiceRequest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Routing\Redirector;

class InvoiceController extends Controller
{


    public function __construct( Request $request, Redirector $redirect )
	{
		
		if( session( 'isLogin' ) == false or empty( session( 'name' ) )  or session( 'name' ) == null )
		{
			$redirect->to('/login')->send();
		}
	}

		
	public function get_patient_list_based_patient_id( $id )
	{

		$patient =  DB::table('patients')->where( 'id', $id )->first();
		$invoice = DB::table('invoices')->where( 'patient_id', $id )->orderBy( 'id', 'DESC' )->first();

		$data = [
			'patient' => $patient,
			'invoice' => $invoice
		];

		return response()->json( $data );
	}
	public function retrieve_service(Request $request)
	{
		$service =  DB::table( 'services' )->where( 'id', $request->product_id )->first();
		return response()->json( $service );
	}

	public function get_retrieve_service()
	{
		$service =  DB::table('services')->where('id', $request->$request)->first();
		return response()->json($service);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$invoices = Invoice::orderBy('id','DESC')->get();
		$data = [
			'invoices' => $invoices
		];
		return view('backend.layout.invoice.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('backend.layout.invoice.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreInvoiceRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		// return $request->all();
		// $validatedData = $request->validate([
		//     'patient_id' => 'required',
		//     'patient_phone' => 'required',
		//     'patient_name' => 'required',
		//     'payment_date' => 'required',
		//     'total' => 'required',
		//     'grand_total' => 'required',
		//     'paid_amount' => 'required',
		//     'payment_method' => 'required',
		//   ]);

		$invoice = new Invoice;

		$invoice->patient_id =$request->patient_id;
		$invoice->doctor_id = $request->doctor_id;
		$invoice->added_by_id = $request->added_by_id;
		$invoice->patient_phone = $request->patient_phone;
		$invoice->patient_name = $request->patient_name;
		$invoice->patient_address = $request->patient_address;
		$invoice->payment_date = $request->payment_date;
		$invoice->total_payment = 111;
		$invoice->tax_total = $request->total_tax;
		$invoice->grand_total = $request->grand_total_price;
		$invoice->paid_amount = $request->paid_amount;
		$invoice->previous_due = $request->previous_due;


		if( !empty( $request->decrease ) )
		{
			$invoice->decrease = $request->decrease;
		}
		if( $request->isClose == 1 )
		{
			$invoice->due_total = $request->due_amount;

		}else{
			$invoice->due_total = 0;

		}


		$invoice->isClose = $request->isClose;
		$invoice->isRegistered = $request->isRegistered;
		$invoice->payment_note = $request->payment_note;
		$invoice->payment_method = $request->payment_method;
		$invoice->payment_method_note = $request->payment_method_note;

		$invoice->save();

		$insertedInvoiceID = $invoice->id;

		$totalDiscount = 0;
		foreach( $request->product_name as  $index=>$product  )
		{

			DB::table('invoice_details')->insert([ 
				'invoice_id' => $insertedInvoiceID,
				'service_id' => $request->product_id[$index],
				'service_name' => $request->product_name[$index],
				'quantity' => $request->product_quantity[$index],
				'discount' => $request->discount[$index],
				'rate' => $request->product_rate[$index],
				'total' => $request->total_price[$index],
				'service_total_tax' => $request->service_total_tax[$index],
				'service_all_tax' => $request->service_all_tax[$index],
			]);

			$totalDiscount += $request->discount[$index];

		}

		// Updated Total Discount
		$invoice = Invoice::find( $insertedInvoiceID );
		$invoice->total_discount = $totalDiscount;
		$invoice->save();
		

		return redirect( route( 'invoice_added_form' ) )->with( 'status', 'Form Data Has Been Inserted' );


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Invoice  $invoice
	 * @return \Illuminate\Http\Response
	 */
	public function show(Invoice $invoice)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Invoice  $invoice
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Invoice $invoice)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
	 * @param  \App\Models\Invoice  $invoice
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $invoiceID )
	{

		$invoice = Invoice::find( $invoiceID );
		$invoice->patient_id =$request->patient_id;
		$invoice->doctor_id = $request->doctor_id;
		$invoice->added_by_id = $request->added_by_id;
		$invoice->patient_phone = $request->patient_phone;
		$invoice->patient_name = $request->patient_name;
		$invoice->patient_address = $request->patient_address;
		$invoice->payment_date = $request->payment_date;
		$invoice->total_payment = 111;
		$invoice->tax_total = $request->total_tax;
		$invoice->grand_total = $request->grand_total_price;
		$invoice->paid_amount = $request->paid_amount;
		$invoice->previous_due = $request->previous_due;


		if( !empty( $request->decrease ) )
		{
			$invoice->decrease = $request->decrease;
		}
		if( $request->isClose == 1 )
		{
			$invoice->due_total = $request->due_amount;

		}else{
			$invoice->due_total = 0;

		}


		$invoice->isClose = $request->isClose;
		$invoice->isRegistered = $request->isRegistered;
		$invoice->payment_note = $request->payment_note;
		$invoice->payment_method = $request->payment_method;
		$invoice->payment_method_note = $request->payment_method_note;

		$invoice->save();


		DB::table('invoice_details')
			->where( 'invoice_id', $invoiceID )
			->delete();


		$totalDiscount = 0;

		foreach( $request->product_name as  $index=>$product  )
		{
			DB::table('invoice_details')->insert([ 
				'invoice_id' => $invoiceID,
				'service_id' => $request->product_id[$index],
				'service_name' => $request->product_name[$index],
				'quantity' => $request->product_quantity[$index],
				'discount' => $request->discount[$index],
				'rate' => $request->product_rate[$index],
				'total' => $request->total_price[$index],
				'service_total_tax' => $request->service_total_tax[$index],
				'service_all_tax' => $request->service_all_tax[$index],
			]);

			$totalDiscount += $request->discount[$index];
		}

		// Updated Total Discount
		$invoice = Invoice::find( $invoiceID );
		$invoice->total_discount = $totalDiscount;
		$invoice->save();


		
		return redirect( route( 'single_edit_invoice', $invoiceID ) )->with( 'status', 'Form Data Has Been Updated' );





	}


	public function invoiceView( $invoiceID )
	{
		$invoice = Invoice::where( 'id', $invoiceID )->first();
		
		$invoiceDetails = DB::table( 'invoice_details' )->where( 'invoice_id', $invoice->id )->get();

		// echo '<pre>';

		// var_dump( $invoiceDetails );
		// die;


		$data = [
			'invoice' => $invoice,
			'invoiceDetails' => $invoiceDetails,
		];

		return view('backend.layout.invoice.details', compact('data') );
	}

	public function invoiceEdit( $invoiceID )
	{
		$invoice = Invoice::where( 'id', $invoiceID )->first();
		
		$invoiceDetails = DB::table( 'invoice_details' )->where( 'invoice_id', $invoice->id )->get();

		// echo '<pre>';

		// var_dump( $invoiceDetails );
		// die;


		$data = [
			'invoice' => $invoice,
			'invoiceDetails' => $invoiceDetails,
		];

		return view('backend.layout.invoice.edit', compact('data') );
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Invoice  $invoice
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Invoice $invoice)
	{
		//
	}
}
