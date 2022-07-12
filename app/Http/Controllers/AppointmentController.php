<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
// use App\Http\Requests\StoreAppointmentRequest;
// use App\Http\Requests\UpdateAppointmentRequest;
use Illuminate\Http\Request;
use DB;

class AppointmentController extends Controller
{
   /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{

		$appointments = Appointment::all();
		$data = [
			'appointments' => $appointments
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
		
        $doctors = Doctor::all();
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
		$validatedData = $request->validate([
			'patient_phone' => 'required',
			'name' => 'required',
		]);

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
			
		$appointment->save();

		return redirect(route('appointment_registration_form'))->with('status', 'Form Data Has Been Inserted');
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
        $doctors = Doctor::all();

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
        $doctors = Doctor::all();

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

		$validatedData = $request->validate([
			'patient_phone' => 'required',
			'name' => 'required',
		]);

		$appointment = Appointment::find( $appointmentID );

		$appointment->isRegistered = $request->isRegistered;
		$appointment->patient_id = $request->patient_id;
		$appointment->patient_phone = $request->patient_phone;
		$appointment->name = $request->name;
		$appointment->date = $request->date;
		$appointment->time = $request->time;
		$appointment->doctor_id = $request->doctor_id;
		$appointment->gender = $request->gender;
		$appointment->note = $request->note;
			
		$appointment->save();

		return redirect( route( 'appointment_edit', $appointmentID ) )->with('status', 'Form Data Has Been Updated');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Appointment  $appointment
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $appointmentID )
	{
		$status = Appointment::destroy( $appointmentID );
		
		if( $status )
		{
			return redirect( route('doctor_list') );
		}
	
	}
}
