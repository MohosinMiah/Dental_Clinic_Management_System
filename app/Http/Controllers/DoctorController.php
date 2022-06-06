<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
// use App\Http\Requests\StoreDoctorRequest;
// use App\Http\Requests\UpdateDoctorRequest;
use Illuminate\Http\Request;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
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
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:doctors|max:18',
            'password' => 'required',
          ]);
   
          $doctor = new Doctor;
   
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
          $doctor->profile_pic = $request->profile_pic;
   
          $doctor->save();
   
          return redirect(route('doctor_registration_form'))->with('status', 'Form Data Has Been Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('backend.layout.doctor.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
