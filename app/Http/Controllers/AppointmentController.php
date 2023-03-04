<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
// use App\Http\Requests\StoreAppointmentRequest;
// use App\Http\Requests\UpdateAppointmentRequest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Routing\Redirector;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{

	public function __construct( Request $request, Redirector $redirect )
	{
		
		// if( session( 'isLogin' ) == false or empty( session( 'name' ) )  or session( 'name' ) == null )
		// {
		// 	$redirect->to('/login')->send();
		// }
	}


   /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{

		$appointments = Appointment::orderBy( 'id','DESC' );

		$startDate = date( 'Y-m-d', strtotime( Carbon::now() ) );

		// end time will be more than 7 day than current date
		$endDate = date( 'Y-m-d', strtotime( Carbon::now()->addDays( 7 ) ) );

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
		// appointments order by id asc
		// $appointments->orderBy( 'id', 'DESC' );

		$data = [
			'appointments'          => $appointments->get(),
			'total_appointment'     => $appointments->count( 'id' ),
			'startDate'             => $startDate,
			'endDate'               => $endDate
		];
	

		return view('backend.layout.appointment.index', compact('data'));

	}

	public function appoinment_report_filter_appointment()
{
	$appointments = DB::table('appointments')->select( '*' );
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
		'appointments'          => $appointments->get(),
		'total_appointment' => $appointments->count( 'id' )
	];
	return view('backend.layout.appointment.index', compact('data'));
}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		
        $doctors = Doctor::get();
		$data = [
			'doctors' => $doctors
		];


		return view('backend.layout.appointment.add', compact('data'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreAppointmentRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator =  Validator::make($request->all(), [
			'patient_phone'    => [
				'required',
				'max:18',
			],
			'name'  => 'required',
			'date'     => 'required',
		]);
		if( $validator->fails() )
		{
			return redirect( route('appointment_registration_form') )->with('status', 'Fail, Please provide required data');
		}
		else
		{
			$appointment = new Appointment;

			$appointment->isRegistered = $request->isRegistered;
			$appointment->patient_id = $request->patient_id;
			$appointment->patient_phone = $request->patient_phone;
			$appointment->name = $request->name;
			$appointment->date = $request->date;
			$appointment->time = $request->time;
			$appointment->doctor_id = $request->doctor_id;
			$appointment->gender = $request->gender;
			$appointment->note = $request->note;
			$appointment->user_id = session( 'authorID' );
				
			$appointment->save();
	
			return redirect(route('appointment_registration_form'))->with('status', 'Form Data Has Been Inserted');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Appointment  $appointment
	 * @return \Illuminate\Http\Response
	 */
	public function show( $doctorID )
	{
		$appointment = DB::table( 'appointments' )->where( 'id' , $doctorID )->first();
        $doctors = Doctor::get();

		$data = [
			'appointment' => $appointment,
			'doctors' => $doctors

		];

		return view( 'backend.layout.appointment.show' , compact( 'data' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Appointment  $appointment
	 * @return \Illuminate\Http\Response
	 */
	public function edit(  $doctorID  )
	{
		$appointment = DB::table( 'appointments' )->where( 'id' , $doctorID )->first();
        $doctors = Doctor::get();

		$data = [
			'appointment' => $appointment,
			'doctors' => $doctors
		];

		return view( 'backend.layout.appointment.edit' , compact( 'data' ) );

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
	 * @param  \App\Models\Appointment  $appointment
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $appointmentID )
	{


		$validator =  Validator::make($request->all(), [
			'patient_phone'    => [
				'required',
				'max:18',
			],
			'name' => 'required',
			'date'     => 'required',
		]);
		if( $validator->fails() )
		{
			return redirect( route( 'appointment_edit', $appointmentID ) )->with('status', 'Fail, Provide required data');

		}
		else
		{
			$appointment = Appointment::where( 'id', $appointmentID )->firstOrFail();

			$appointment->isRegistered = $request->isRegistered;
			$appointment->patient_id = $request->patient_id;
			$appointment->patient_phone = $request->patient_phone;
			$appointment->name = $request->name;
			$appointment->date = $request->date;
			$appointment->time = $request->time;
			$appointment->doctor_id = $request->doctor_id;
			$appointment->gender = $request->gender;
			$appointment->note = $request->note;
			$appointment->user_id = session( 'authorID' );

			$appointment->save();
	
			return redirect( route( 'appointment_edit', $appointmentID ) )->with('status', 'Form Data Has Been Updated');
		}
		

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Appointment  $appointment
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $appointmentID )
	{
		$status = Appointment::where( 'id' , $appointmentID )->firstOrFail();
		$status->destroy();
		if( $status )
		{
			return redirect( route('appointment_list') );
		}
	}
}
