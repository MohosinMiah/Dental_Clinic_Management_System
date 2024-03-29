<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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
		
		// if( session( 'isLogin' ) == false or empty( session( 'name' ) )  or session( 'name' ) == null )
		// {
		// 	$redirect->to('/login')->send();
		// }
	}

		
	public function get_patient_list_based_patient_id( $id )
	{

		// $patient =  DB::table('patients')->where( 'phone', $id )->first();
		if( strlen( (string) $id ) > 5 )
		{
			$patient =  DB::table('patients')->where( 'phone', $id )->first();
		}
		else
		{
			$patient =  DB::table('patients')->where( 'id', $id )->first();
		}


		$invoice = DB::table('invoices')->where( 'patient_id', $patient->id )->orderBy( 'id', 'DESC' )->first();

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

	public function get_retrieve_service( Request $request )
	{
		$service =  DB::table('services')->where('id', $request->product_id)->first();
		return response()->json($service);
	}

	public function get_product_service_list()
	{
		$service =  DB::table('services')
		->select('id AS value', 'service_name AS label')
		->get();
		return response()->json($service);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$invoices = Invoice::orderBy('id','ASC')->get();
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
		
		$doctors = Doctor::orderBy('id','ASC')->get();
		$data = [
			'doctors' => $doctors
		];
		return view( 'backend.layout.invoice.add' , compact('data') );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreInvoiceRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		$invoice = new Invoice;

		$invoice->patient_id =$request->patient_id;
		$invoice->doctor_id = $request->doctor_id;
		$invoice->added_by_id = $request->added_by_id;
		$invoice->patient_phone = $request->patient_phone;
		$invoice->patient_name = $request->patient_name;
		$invoice->patient_address = $request->patient_address;
		$invoice->payment_date = $request->payment_date;
		$invoice->total_payment = 0;
		$invoice->tax_total = $request->total_tax;
		
		$invoice->total       = $request->grand_total_price;
		$invoice->grand_total = $request->grandTotalWithDue;

		$invoice->paid_amount = $request->paid_amount;
		$invoice->previous_due = $request->previous_due;


		if( !empty( $request->decrease ) )
		{
			$invoice->decrease = $request->decrease;
		}
		if( !empty( $request->cash_back ) )
		{
			$invoice->cash_back = $request->cash_back;
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
        $invoice->user_id = session( 'authorID' );
        
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
				'soft_delete' => false,
			]);

			$totalDiscount += $request->discount[$index];

		}

		// Updated Total Discount
		$invoice = Invoice::find( $insertedInvoiceID );
		$invoice->total_discount = $totalDiscount;
		$invoice->save();
		

		return redirect( route( 'single_view_invoice', $insertedInvoiceID ) )->with( 'status', 'Form Data Has Been Inserted' );


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

		$invoice = Invoice::where( 'id', $invoiceID )->firstOrFail();

		$invoice->patient_id =$request->patient_id;
		$invoice->doctor_id = $request->doctor_id;
		$invoice->added_by_id = $request->added_by_id;
		$invoice->patient_phone = $request->patient_phone;
		$invoice->patient_name = $request->patient_name;
		$invoice->patient_address = $request->patient_address;
		$invoice->payment_date = $request->payment_date;
		$invoice->total_payment = 111;
		$invoice->tax_total = $request->total_tax;

		$invoice->total       = $request->grand_total_price;
		$invoice->grand_total = $request->grandTotalWithDue;

		$invoice->paid_amount = $request->paid_amount;
		$invoice->previous_due = $request->previous_due;


		if( !empty( $request->decrease ) )
		{
			$invoice->decrease = $request->decrease;
		}
		if( !empty( $request->cash_back ) )
		{
			$invoice->cash_back = $request->cash_back;
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
        $invoice->user_id = session( 'authorID' );
 
		$invoice->save();


		DB::table('invoice_details')
		->where( 'invoice_id', $invoiceID )
		->update(['soft_delete' => true ]);
		
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
				'soft_delete' => false,
			]);

			$totalDiscount += $request->discount[$index];
		}

		// Updated Total Discount
		$invoice = Invoice::where( 'id', $invoiceID )->firstOrFail();
		$invoice->total_discount = $totalDiscount;
		$invoice->save();


		
		return redirect( route( 'single_edit_invoice', $invoiceID ) )->with( 'status', 'Form Data Has Been Updated' );





	}


	public function invoiceView( $invoiceID )
	{
		$invoice = Invoice::where( 'id', $invoiceID )->firstOrFail();
		
		$invoiceDetails = DB::table( 'invoice_details' )->where( 'invoice_id', $invoice->id )->where( 'soft_delete', false )->get();

		$doctor = DB::table( 'doctors' )->where( 'id', $invoice->doctor_id )->first();

		// echo '<pre>';

		// var_dump( $invoiceDetails );
		// die;


		$data = [
			'invoice' => $invoice,
			'invoiceDetails' => $invoiceDetails,
			'doctor' => $doctor
		];

		return view('backend.layout.invoice.details', compact('data') );
	}

	public function invoiceEdit( $invoiceID )
	{
		$invoice = Invoice::where( 'id', $invoiceID )->first();
		
		$invoiceDetails = DB::table( 'invoice_details' )->where( 'invoice_id', $invoice->id )->where( 'soft_delete', false )->get();

		$doctor = DB::table( 'doctors' )->get();
		// echo '<pre>';

		// var_dump( $invoiceDetails );
		// die;


		$data = [
			'invoice' => $invoice,
			'invoiceDetails' => $invoiceDetails,
			'doctors' => $doctor
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
