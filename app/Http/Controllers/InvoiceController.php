<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
// use App\Http\Requests\StoreInvoiceRequest;
// use App\Http\Requests\UpdateInvoiceRequest;
use Illuminate\Http\Request;
use DB;

class InvoiceController extends Controller
{


    public function retrieve_service(Request $request)
    {
       $service =  DB::table('services')->where('id', $request->product_id)->first();
       return response()->json($service);
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
        $invoices = Invoice::all();
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

		$invoice->patient_id =11;
		$invoice->doctor_id = $request->doctor_id;
		$invoice->added_by_id = $request->added_by_id;
		$invoice->patient_phone = $request->patient_phone;
		$invoice->patient_name = $request->patient_name;
		$invoice->patient_address = $request->patient_address;
		$invoice->payment_date = $request->payment_date;
		$invoice->total = 111;
		$invoice->tax_total = 1;
		$invoice->grand_total = 1;
		$invoice->paid_amount = 1;
		$invoice->due_total = 1;
		$invoice->payment_note = $request->payment_note;
		$invoice->payment_method = $request->payment_method;
		$invoice->payment_method_note = $request->payment_method_note;

		$invoice->save();

		$insertedInvoiceID = $invoice->id;

		foreach( $request->product_name as  $index=>$product  ) {
	
			DB::table('invoice_details')->insert([ 
				'invoice_id' => $insertedInvoiceID,
				'service_id' => $request->product_id[$index],
				'service_name' => $request->product_name[$index],
				'quantity' => $request->product_quantity[$index],
				'discount' => $request->discount[$index],
				'rate' => $request->product_rate[$index],
				'total' => $request->total_price[$index],
			]);
		}
		die;


		die('ID ' . $insertedInvoiceID);
        //   return redirect( route( 'invoice_added_form' ) )->with( 'status', 'Form Data Has Been Inserted' );
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
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }


    public function invoiceView( $invoiceID )
    {

    }

    public function invoiceEdit( $invoiceID )
    {

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
