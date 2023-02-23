<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Authentication;
use App\Http\Requests\StoreDoctorRequest;
// use App\Http\Requests\UpdateDoctorRequest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{

	public function __construct()
	{
		// if( session( 'isLogin' ) == false or empty( session( 'name' ) ) )
		// {
		// 	return redirect( route( 'login_form' ) );
		// }
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$doctors = Doctor::where( 'clinic_id' , session( 'clinicID' ) )->orderBy( 'id','DESC' )->get();
		$data = [
			'doctors' => $doctors
		];
		return view('backend.layout.doctor.index',compact('data'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		return view('backend.layout.doctor.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreDoctorRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator =  Validator::make($request->all(), [
			'phone'    => [
				'required',
				'max:18',
				Rule::unique('doctors'),
			],
			'name'     => 'required',
		]);
		if( $validator->fails() )
		{
			return redirect(route('doctor_registration_form'))->with('status', 'Fail, Phone number alrady used');
		}
		else
		{
			$doctor = new Doctor;

			$doctor->clinic_id = session( 'clinicID' );
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
    		$doctor->user_id = session( 'authorID' );
			if( $request->hasfile('profile_pic') )
			{
				$profileImage = $request->profile_pic;
				$imageName= time().'_'.$profileImage->getClientOriginalName();
				$profileImage->move(public_path().'/images/', $imageName);  
				$doctor->profile_pic =  $imageName;
			}
			$save =  $doctor->save();
			// After Doctor Register Successfully, We will create doctor roll in authentications table
			// if( $save )
			// {
			// 	$authentication = new Authentication;
			// 	$authentication->name = $request->name;
			// 	$authentication->phone = $request->phone;
			// 	$authentication->email = $request->email;
			// 	$authentication->password = md5( $request->password );
			// 	$authentication->role = 3;
			// 	if( $request->hasfile('profile_pic') )
			// {
			// 	$authentication->profile_pic = $imageName;
			// }
			// 	$authentication->save();
			// }
	
			return redirect(route('doctor_registration_form'))->with('status', 'Form Data Has Been Inserted');
		}
			
		


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Doctor  $doctor
	 * @return \Illuminate\Http\Response
	 */
	public function show( $doctorID )
	{
		$doctor = DB::table( 'doctors' )->where( 'clinic_id' , session( 'clinicID' ) )->where( 'id' , $doctorID )->first();

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
		$doctor = DB::table( 'doctors' )->where( 'clinic_id' , session( 'clinicID' ) )->where( 'id' , $doctorID )->first();
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
		$validator =  Validator::make($request->all(), [
            'phone'    => [
              'required',
              'max:18',
              Rule::unique('doctors')->ignore( $doctorID ),
            ],
            'name'     => 'required',
          ]);

		if( $validator->fails() )
		{
			return redirect( route('doctor_edit' , $doctorID ))->with('status', 'Error, Fail To Update Data');

		}
		else
		{
			$doctor = Doctor::where( 'clinic_id' , session( 'clinicID' ) )->where( 'id', $doctorID )->firstOrFail();

			// $doctor->clinic_id = session( 'clinicID' );
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
        	$doctor->user_id = session( 'authorID' );
			if( $request->hasfile('profile_pic') )
			{
				$profileImage = $request->profile_pic;
				$imageName= time().'_'.$profileImage->getClientOriginalName();
				$profileImage->move(public_path().'/images/', $imageName);  
				$doctor->profile_pic =  $imageName;
			}
	
			$doctor->save();
	
			return redirect( route('doctor_edit' , $doctorID ))->with('status', 'Form Data Has Been Updated');
	
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Doctor  $doctor
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $doctorID )
	{
		$status = Doctor::where( 'clinic_id' , session( 'clinicID' ) )->where( 'id' , $doctorID )->firstOrFail();
		$status->destroy();
		if( $status )
		{
			return redirect( route('doctor_list') );
		}
	
	}
}
