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
	public function index()
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
	 * @param  \App\Http\Requests\StoreDoctorRequest  $request
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
	 * @param  \App\Models\Doctor  $doctor
	 * @return \Illuminate\Http\Response
	 */
	public function show( $doctorID )
	{
		$doctor = DB::table( 'doctors' )->where( 'id' , $doctorID )->first();

		$data = [
			'doctor' => $doctor
		];

		return view( 'backend.layout.doctor.show' , compact( 'data' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Doctor  $doctor
	 * @return \Illuminate\Http\Response
	 */
	public function edit(  $doctorID  )
	{
		$doctor = DB::table( 'doctors' )->where( 'id' , $doctorID )->first();
		$data = [
			'doctor' => $doctor
		];

		return view( 'backend.layout.doctor.edit' , compact( 'data' ) );

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateDoctorRequest  $request
	 * @param  \App\Models\Doctor  $doctor
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $doctorID )
	{

		$validatedData = $request->validate([
			'name' => 'required',
			'phone' => 'required|max:18',
			'password' => 'required',
		]);

		$doctor = Doctor::find( $doctorID );

		$doctor->name = $request->name;
		$doctor->phone = $request->phone;
		$doctor->password = $request->password;
		$doctor->email = $request->email;
		$doctor->designation = $request->designation;
		$doctor->personal_home_page = $request->personal_home_page;
		$doctor->degress = $request->degress;
		$doctor->department = $request->department;
		$doctor->specialist = $request->specialist;
		$doctor->experience = $request->experience;
		$doctor->date_of_birth = $request->date_of_birth;
		$doctor->gender = $request->gender;
		$doctor->blood_group = $request->blood_group;
		$doctor->address = $request->address;
		$doctor->about_me = $request->about_me;

		if( $request->hasfile('profile_pic') )
		{
			$profileImage = $request->profile_pic;
			$imageName= time().'_'.$profileImage->getClientOriginalName();
			$profileImage->move(public_path().'/images/', $imageName);  
			$doctor->profile_pic =  $imageName;
		}

		$doctor->save();

		return redirect( route('doctor_edit' , $doctorID ))->with('status', 'Form Data Has Been Inserted');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Doctor  $doctor
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $doctorID )
	{
		$status = Doctor::destroy( $patientID );
		
		if( $status )
		{
			return redirect( route('doctor_list') );
		}
	
	}
}
