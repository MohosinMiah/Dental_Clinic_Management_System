<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Models\Patient;

// use App\Http\Requests\StorePatientRequest;
// use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PatientController extends Controller
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
    public function index()
    {
		$patients = Patient::where( 'clinic_id' , session( 'clinicID' ) )->orderBy( 'id','DESC' )->get();
        $data = [
            'patients' => $patients
        ];
		return view( 'backend.layout.patient.index',compact('data'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view( 'backend.layout.patient.add' );
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {

		$validator =  Validator::make($request->all(), [
            'phone'    => [
              'required',
              'max:18',
              Rule::unique('patients'),
            ],
            'name'     => 'required',
            
          ]);

		if( $validator->fails() )
		{
			return redirect(route('patient_registration_form'))->with('status', 'Fail, Phone number is alrady used. Please change phone number');

		}
		else
		{

			$patient = new Patient;

			$patient->clinic_id = session( 'clinicID' );
			$patient->name               = $request->name;
			$patient->phone              = $request->phone;
			$patient->age                = $request->age;
			$patient->gender             = $request->gender;
			$patient->email              = $request->email;
			$patient->blood_group        = $request->blood_group;
			$patient->address            = $request->address;
	
			$patient->db                  = $request->db;
			$patient->htn                 = $request->htn;
			$patient->cardiac_disease     = $request->cardiac_disease;
			$patient->hepatitis           = $request->hepatitis;
			$patient->asthma              = $request->asthma;
			$patient->rheumatic_fever     = $request->rheumatic_fever;
			$patient->bleeding_disorder   = $request->bleeding_disorder;
			$patient->drug_allergy        = $request->drug_allergy;
			$patient->pregnant_women      = $request->pregnant_women;
			$patient->lactating_mother    = $request->lactating_mother;
			$patient->note                = $request->note;
	   
			  $patient->save();
	   
			  return redirect(route('patient_registration_form'))->with('status', 'Form Data Has Been Inserted');
		}
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show( $patientID )
    {
		$patient = DB::table( 'patients' )->where( 'clinic_id' , session( 'clinicID' ) )->where( 'id' , $patientID )->first();

		$data = [
            'patient' => $patient
        ];

		return view( 'backend.layout.patient.show' , compact( 'data' ) );
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit( $patientID )
    {
        $patient = DB::table( 'patients' )->where( 'clinic_id' , session( 'clinicID' ) )->where( 'id' , $patientID )->first();

		$data = [
            'patient' => $patient
        ];

		return view( 'backend.layout.patient.edit' , compact( 'data' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $patientID )
    {
        
          $validator =  Validator::make($request->all(), [
            'phone'    => [
              'required',
              'max:18',
              Rule::unique('patients')->ignore( $patientID ),
            ],
            'name'     => 'required',
            
          ]);

		if( $validator->fails() )
		{
			return redirect(route('patient_edit', $patientID ))->with('status', 'Phone number alrady used and other errors.');
		}
		else
		{
			$patient = Patient::where( 'clinic_id' , session( 'clinicID' ) )->where( 'id', $patientID )->firstOrFail();
		
			$patient->name               = $request->name;
			$patient->phone              = $request->phone;
			$patient->age                = $request->age;
			$patient->gender             = $request->gender;
			$patient->email              = $request->email;
			$patient->blood_group        = $request->blood_group;
			$patient->address            = $request->address;

			$patient->db                  = $request->db;
			$patient->htn                 = $request->htn;
			$patient->cardiac_disease     = $request->cardiac_disease;
			$patient->hepatitis           = $request->hepatitis;
			$patient->asthma              = $request->asthma;
			$patient->rheumatic_fever     = $request->rheumatic_fever;
			$patient->bleeding_disorder   = $request->bleeding_disorder;
			$patient->drug_allergy        = $request->drug_allergy;
			$patient->pregnant_women      = $request->pregnant_women;
			$patient->lactating_mother    = $request->lactating_mother;
			$patient->note                = $request->note;

			$patient->note               = $request->note;
	
			$patient->save();
   
          return redirect(route('patient_edit', $patientID ))->with('status', 'Form Data Has Been Updated');
		}
    }


    function service_history( $patientID )
    {
		$patient    = DB::table( 'patients' )->where( 'clinic_id' , session( 'clinicID' ) )->where( 'id' , $patientID )->first();
		$invoices   = DB::table( 'invoices' )->where( 'clinic_id' , session( 'clinicID' ) )->where( 'patient_id' , $patientID )->get();
		$total_paid = DB::table( 'invoices' )->where( 'clinic_id' , session( 'clinicID' ) )->where( 'patient_id' , $patientID )->sum( 'paid_amount' );

		$data = [
            'patient'    => $patient,
			'invoices'   => $invoices,
			'total_paid' => $total_paid
        ];
		return view( 'backend.layout.patient.service_history' , compact( 'data' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy( $patientID )
    {
		$status = Patient::where( 'clinic_id' , session( 'clinicID' ) )->where( 'id' , $patientID )->firstOrFail();
		$status->destroy();
		if( $status )
		{
			return redirect( route('patient_list') );
		}

    }
}
