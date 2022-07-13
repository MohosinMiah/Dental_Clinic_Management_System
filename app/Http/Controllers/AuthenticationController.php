<?php

namespace App\Http\Controllers;

use App\Models\Authentication;
// use App\Http\Requests\StoreAuthenticationRequest;
// use App\Http\Requests\UpdateAuthenticationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class AuthenticationController extends Controller
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
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}



	public function login()
	{
		return view('backend/layout/auth/login');
	}

	public function forgoten()
	{
		return view('backend/layout/auth/forgot');
	}




	public function loginCheck( Request $request )
	{
		$phone    = $request->phone;
		$password = $request->password;

		// Convert plain text to md5() type
		
		$password = md5( $password );
		
		$authenticatedUser = DB::table('authentications')->where( 'phone', $phone )->where( 'password', $password )->first();
	
		if( !empty( $authenticatedUser )  )
		{
			// Store data in the session...
			session([ 'name'    => $authenticatedUser->name ] );
			session([ 'phone'   => $authenticatedUser->phone ] );
			session([ 'email'   => $authenticatedUser->email ] );
			session([ 'role'    => $authenticatedUser->role ] );
			session([ 'isLogin' => true ] );
			return redirect('/');
		}
		return redirect( route( 'login_form' ) )->with( 'status', 'Phone Number or password not matched' );
	}



	public function forgot_password_sent_otp( Request $request )
	{
		

		$phone  = $request->phone;
		// Check user is exist or not 
		$userIsExist = DB::table( 'authentications' )->where( 'phone', $phone )->first();

		



		if( !empty( $userIsExist ) && $userIsExist != 'NULL' )
		{
			// Generate Random Code
			$otp    = rand(1000,9999);
			// Insert Random Code in database for further match if user exist 
			session( [ 'phoneVerifyOtp'   => $phone ] );

			DB::table( 'authentications' )
			->where( 'phone', $phone )
			->update([
				'otp' => $otp
			]);

			// Send OTP  POST Method 
			// $phone  = $request->phone;
			// $url    = "http://66.45.237.70/api.php";
			// $number = $phone;
			// $text="Dear Customer, Your OTP is ##". $otp . "##. Use this code for varification your identity.";

			// $data= array(
			// 'username'=>"01857126452",
			// 'password'=>"2RVXW48F",
			// 'number'=>"$number",
			// 'message'=>"$text"
			// );

			// $ch = curl_init(); // Initialize cURL
			// curl_setopt($ch, CURLOPT_URL,$url);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// $smsresult = curl_exec($ch);
			// $p = explode("|",$smsresult);
			// $sendstatus = $p[0];

			// redirect for varify otp 
			return redirect( route( 'otp_verify_form' ) );
		}
		else
		{
			return redirect( route('forgot_form') )->with( 'status', 'No User Found. Please Contact Admin' );
		}
	}

	public function otp_verify_form()
	{
		return view('backend/layout/auth/otp');

	}



	public function otp_verify( Request $request )
	{
		
		
		$phone = $request->phone;
		$otp = $request->otp;
        
		// Check Password
		$password = $request->password;
		$passwordConfirmation = $request->passwordConfirmation;

		// Check Password Mismatch Or Not
		if( $password != $passwordConfirmation )
		{
			return redirect( route('otp_verify_form') )->with( 'status', 'Password Mismatch' );
		}

		// Check Otp Is Valid Or Not
		$checkOtp = DB::table( 'authentications' )->where( 'phone', $phone )->where( 'otp', $otp )->first();

		if( !empty( $checkOtp ) )
		{
			
			$updatePassword = DB::table( 'authentications' )
							->where( 'phone', $phone )
							->where( 'otp', $otp )
							->update([
								'password' => md5( $password )
							]);
			return redirect( route('login_form') )->with( 'status', 'Password update successfully' );
		}
		else
		{
			return redirect( route('otp_verify_form') )->with( 'status', 'Otp is not valid' );
		}
	}



	
	public function logout()
	{
		session([ 'name'    => '' ] );
		session([ 'phone'   => '' ] );
		session([ 'email'   => '' ] );
		session([ 'role'    => '' ] );
		session([ 'isLogin' => false ] );

		return redirect( route('login_form') );
	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreAuthenticationRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreAuthenticationRequest $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Authentication  $authentication
	 * @return \Illuminate\Http\Response
	 */
	public function show(Authentication $authentication)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Authentication  $authentication
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Authentication $authentication)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateAuthenticationRequest  $request
	 * @param  \App\Models\Authentication  $authentication
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateAuthenticationRequest $request, Authentication $authentication)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Authentication  $authentication
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Authentication $authentication)
	{
		//
	}
}
