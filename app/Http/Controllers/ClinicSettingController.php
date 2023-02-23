<?php

namespace App\Http\Controllers;

use App\Models\ClinicSetting;
use App\Http\Requests\StoreClinicSettingRequest;
use App\Http\Requests\UpdateClinicSettingRequest;
use App\Models\Authentication;
use Carbon\Carbon;
use DB;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class ClinicSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		
		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{

			$clinic_info = ClinicSetting::where( 'id' , session( 'clinicID' ) )->orderBy( 'id','DESC' )->first();
			$data = [
				'clinic_info' => $clinic_info
			];
			return view('backend.layout.clinic.index', compact('data'));
		}
		else
		{
			return redirect()->route('login_form');

		}

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_new_user()
    {
		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{
			return view('backend.layout.clinic.addUser');
		}
		else
		{
			return redirect()->route('login_form');

		}
    }

	public function user_list()
    {
		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{
			$users = Authentication::where( 'clinic_id' , session( 'clinicID' ) )->orderBy( 'id','DESC' )->get();
			$data = [
				'users' => $users
			];
        return view('backend.layout.clinic.userList' , compact( 'data' ) );
		}
		else
		{
			return redirect()->route('login_form');
		}
		
    }


	public function clinic_user_edit( $userID )
	{
		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{
			$user = Authentication::where( 'clinic_id' , session( 'clinicID' ) )->where( 'id' , $userID )->first();

			$data = [
				'user' => $user,
			];

			return view( 'backend.layout.clinic.editUser' , compact( 'data' ) );
		}
		else
		{
			return redirect()->route('login_form');

		}

		

	}


	public function clinic_update_user( Request $request, $userID )
	{

		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{
			$adminUser = Authentication::where( 'clinic_id' , session( 'clinicID' ) )->where( 'id', $userID )->firstOrFail();

			$validator =  Validator::make($request->all(), [
				'phone'    => [
					'required',
					'max:11',
					Rule::unique('authentications')->ignore($userID),
				],
				'name'     => 'required',
			]);
	
			if( $validator->fails() )
			{
				return redirect( route('clinic_user_edit' , $userID ))->with('status', 'Fail, This phone number is alrady used.');
			}
			else
			{
				$adminUser->name      = $request->name;
				$adminUser->phone     = $request->phone;
				$adminUser->email     = $request->email;
				if( !empty( $request->password ) or $request->password != '' )
				{
					$password                = md5( $request->password );
					$adminUser->password     = $password;
				}
				$adminUser->user_id = session( 'authorID' );
				$save =  $adminUser->save();
				return redirect( route('clinic_user_edit' , $userID ))->with('status', 'User Data Updated');
			
			}
		}
		else
		{
			return redirect()->route('login_form');

		}

		
        
	}


    public function add_new_user_post( Request $request )
    {

		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{
			$adminUser = new Authentication;
			// $validatedData = $request->validate([
			// 	'phone'    => 'required|unique:authentications|max:30',
			// 	'name'     => 'required',
			// 	'password' => 'required',
			// ]);
	
			// if( $validatedData )
			// {
			// 	return redirect( route('add_new_user') )->with('status', 'This phone number alrady used');
			// }
			$validator =  Validator::make($request->all(), [
				'phone'    => 'required|unique:authentications|max:30',
				'name'     => 'required',
				'password' => 'required',
			]);
		
			if ($validator->fails()) {
				return redirect( route('add_new_user') )->with('status', 'This phone number alrady used.Use different phone number');
			} else {
				$adminUser->clinic_id = session( 'clinicID' );
				$adminUser->name      = $request->name;
				$adminUser->phone     = $request->phone;
				$adminUser->email     = $request->email;
	
				$password = md5( $request->password );
				$adminUser->password     = $password;
        		$adminUser->user_id = session( 'authorID' );
				$save =  $adminUser->save();
	
				return redirect(route('add_new_user'))->with('status', 'Form Data Has Been Inserted');
			}
	
		}
		else
		{
			return redirect()->route('login_form');

		}

       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClinicSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClinicSetting  $clinicSetting
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicSetting $clinicSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClinicSetting  $clinicSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(ClinicSetting $clinicSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClinicSettingRequest  $request
     * @param  \App\Models\ClinicSetting  $clinicSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {

		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{
			
			$clinic = ClinicSetting::where( 'id' , session( 'clinicID' ) )->firstOrFail();

			$clinic->phone   = $request->phone;
			$clinic->clinic_name   = $request->clinic_name;
			$clinic->address = $request->address;
			$clinic->note    = $request->note;
			$clinic->user_id = session( 'authorID' );

			if( $request->hasfile( 'logo' ) )
			{
				$clinic_logo = $request->logo;
				$imageName = time().'_'.$clinic_logo->getClientOriginalName();
				$clinic_logo->move(public_path().'/images/', $imageName);  
				$clinic->logo =  $imageName;
			}
	
			$save =  $clinic->save();
	
			return redirect( route('clinic_info' ))->with('status', 'Clinic Info Record Updated Successfully');
	
		}
		else
		{
			return redirect()->route('login_form');

		}

		

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClinicSetting  $clinicSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicSetting $clinicSetting)
    {
        //
    }
}
