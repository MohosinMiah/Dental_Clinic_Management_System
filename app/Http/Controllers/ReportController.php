<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Appointment;
use App\Models\Invoice;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;



class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

/**
 * Payment  Report START 
*/


public function payment_report()
{
	$invoices = Invoice::where( 'clinic_id' , session( 'clinicID' ) )->orderBy('id','DESC')->get();
	$data = [
		'invoices'          => $invoices,
		'total_paid_amount' => DB::table( 'invoices' )->where( 'clinic_id' , session( 'clinicID' ) )->sum( 'paid_amount' )
	];
	return view('backend.layout.report.invoice.index', compact('data'));
}

public function payment_report_filter()
{
	$invoices = DB::table('invoices')->select( '*' )->where( 'clinic_id' , session( 'clinicID' ) );
	if( !empty( $_GET[ 'start_date' ] ) )
	{
		$startDate  = $_GET[ 'start_date' ];
		
	}

	if( !empty( $_GET[ 'end_date' ] ) )
	{
		$endDate    = $_GET[ 'end_date' ];
	}

	if( !empty( $startDate ) )
	{	
		$invoices->where( 'payment_date', '>=', $startDate );
	}

	if( !empty( $endDate ) )
	{
		$invoices->where('payment_date', '<=', $endDate );

	}
	else
	{
		$invoices->where( 'payment_date', '<=', date( 'Y-m-d', strtotime( Carbon::now() ) ) );
	}

	$data = [
		'invoices'          => $invoices->get(),
		'total_paid_amount' => $invoices->sum( 'paid_amount' )
	];
	return view('backend.layout.report.invoice.index', compact('data'));
}
/**
 * Payment  Report END 
*/


/**
 * Appointment  Report START 
*/
public function appoinment_report()
{
	$appointments = Appointment::where( 'clinic_id' , session( 'clinicID' ) )->orderBy( 'id','DESC' );
	$data = [
		'appointments'          => $appointments->get(),
		'total_appointment'     => $appointments->count( 'id' )
	];
	return view('backend.layout.report.appointment.index', compact('data'));
}

public function appoinment_report_filter()
{
	$appointments = DB::table('appointments')->select( '*' )->where( 'clinic_id' , session( 'clinicID' ) );
	if( !empty( $_GET[ 'start_date' ] ) )
	{
		$startDate  = $_GET[ 'start_date' ];
	}

	if( !empty( $_GET[ 'end_date' ] ) )
	{
		$endDate    = $_GET[ 'end_date' ];
	}

	if( !empty( $startDate ) )
	{	
		$appointments->where( 'date', '>=', $startDate );
	}

	if( !empty( $endDate ) )
	{
		$appointments->where('date', '<=', $endDate);

	}
	else
	{
		$appointments->where( 'date', '<=', date( 'Y-m-d', strtotime( Carbon::now() ) ) );
	}

	$data = [
		'appointments'      => $appointments->get(),
		'total_appointment' => $appointments->count( 'id' )
	];
	return view('backend.layout.report.appointment.index', compact('data'));
}

/**
 * Appointment  Report END 
*/


/**
 * Patient  Report START 
*/
public function patient_report()
{
	$patients = Patient::where( 'clinic_id' , session( 'clinicID' ) )->orderBy( 'id','DESC' )->get();
	$data =
	[
		'patients'        => $patients->get(),
		'total_patient'   => $patients->count( 'id' )
	];
	return view('backend.layout.report.patient.index', compact('data'));
}

public function patient_report_filter()
{
	$patients = DB::table('patients')->select( '*' )->where( 'clinic_id' , session( 'clinicID' ) );

	if( !empty( $_GET[ 'start_date' ] ) )
	{
		$startDate  = $_GET[ 'start_date' ];
		
	}

	if( !empty( $_GET[ 'end_date' ] ) )
	{
		$endDate    = $_GET[ 'end_date' ];
	}

	if( !empty( $startDate ) )
	{	
		$patients->where( 'created_at', '>=', $startDate );
	}

	if( !empty( $endDate ) )
	{
		$patients->where('created_at', '<=', $endDate);

	}
	else
	{
		$patients->where( 'created_at', '<=', date( 'Y-m-d', strtotime( Carbon::now() ) ) );
	}

	$data = [
		'patients'       => $patients->get(),
		'total_patient'  => $patients->count( 'id' )
	];
	return view('backend.layout.report.patient.index', compact('data'));
}
/**
 * Patient  Report END 
*/


/**
 * Graphical Report START 
*/
// https://github.com/LaravelDaily/laravel-charts

public function graphical_report_all()
{

	$chart_options = [
		'chart_title' => 'Patients By Months',
		'report_type' => 'group_by_date',
		'model' => 'App\Models\Patient',
		'group_by_field' => 'created_at',
		'group_by_period' => 'month',
		'chart_type' => 'pie',
	];
    $chart1 = new LaravelChart($chart_options);


    $chart_options = [
        'chart_title' => 'Paid Amount By Dates',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\Invoice',
        'group_by_field' => 'created_at',
        'group_by_period' => 'day',
        'aggregate_function' => 'sum',
        'aggregate_field' => 'paid_amount',
        'chart_type' => 'line',
    ];

    $chart3 = new LaravelChart($chart_options);

	return view('backend.layout.report.graphical_report', compact('chart1', 'chart3'));
}

/**
 * Graphical Report END 
*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportRequest  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
