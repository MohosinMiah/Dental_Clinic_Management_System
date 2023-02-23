<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ClinicSettingController;
use App\Http\Controllers\ReportController;
use App\Models\ClinicSetting;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	return view('backend.layout.dashboard.index');
})->name('dashboard');



// ********************    Authentication MODULE START ********************************

Route::get( '/login', [ AuthenticationController::class, 'login'] )->name('login_form');

Route::get( '/forgoten/password', [ AuthenticationController::class, 'forgoten'] )->name('forgot_form');

Route::get( '/verify/otp', [ AuthenticationController::class, 'otp_verify_form'] )->name('otp_verify_form');

Route::post( '/verify/otp/post', [ AuthenticationController::class, 'otp_verify'] )->name('otp_verify');



Route::post( '/forgoten/password/send_otp', [ AuthenticationController::class, 'forgot_password_sent_otp'] )->name('forgot_password_sent_otp');


Route::post( '/login/check', [ AuthenticationController::class, 'loginCheck'] )->name('login_check');

Route::get( '/logout', [ AuthenticationController::class, 'logout'] )->name('logout');

Route::get( '/profile', [ AuthenticationController::class, 'profile'] )->name('profile');

Route::get( '/settings', [ AuthenticationController::class, 'settings'] )->name('settings');

Route::post( '/profile/update/post', [ AuthenticationController::class, 'profile_update'] )->name('profile_update_post');

Route::post( '/profile/setting/phone/update/post', [ AuthenticationController::class, 'profile_setting_update_phone'] )->name('profile_setting_update_phone');

Route::post( '/profile/setting/password/update/post', [ AuthenticationController::class, 'profile_setting_update_password'] )->name('profile_setting_update_password');


Route::get( '/user/delete/{id}', [ AuthenticationController::class, 'destroy'] )->name('clinic_user_delete');



// ********************    Authentication MODULE End ********************************



// ********************    APPOINTMENT MODULE START ********************************

Route::get( '/appointment/create', [ AppointmentController::class, 'create'] )->name('appointment_registration_form');
Route::post( '/appointment/create/post', [ AppointmentController::class, 'store'] )->name('appointment_registration_save');
Route::get( '/appointment/list', [ AppointmentController::class, 'index'] )->name('appointment_list');



Route::post( '/appointment/update/post/{id}', [ AppointmentController::class, 'update'] )->name('appointment_update_save');
Route::get( '/appointment/filter', [ AppointmentController::class, 'appoinment_report_filter_appointment'] )->name('appoinment_report_filter_appointment');

Route::get( '/appointment/show/{id}', [ AppointmentController::class, 'show'] )->name('appointment_show');
Route::get( '/appointment/edit/{id}', [ AppointmentController::class, 'edit'] )->name('appointment_edit');
// Route::get( '/appointment/delete/{id}', [ AppointmentController::class, 'destroy'] )->name('appointment_delete');
// ********************    APPOINTMENT MODULE End ********************************



// ********************    DOCTOR MODULE START ********************************

Route::get( '/doctor/register', [ DoctorController::class, 'create'] )->name('doctor_registration_form');
Route::post( '/doctor/register/post', [ DoctorController::class, 'store'] )->name('doctor_registration_save');
Route::get( '/doctor/list', [ DoctorController::class, 'index'] )->name('doctor_list');

Route::post( '/doctor/update/post/{id}', [ DoctorController::class, 'update'] )->name('doctor_update_save');
Route::get( '/doctor/show/{id}', [ DoctorController::class, 'show'] )->name('doctor_show');
Route::get( '/doctor/edit/{id}', [ DoctorController::class, 'edit'] )->name('doctor_edit');
// Route::get( '/doctor/delete/{id}', [ DoctorController::class, 'destroy'] )->name('doctor_delete');

// ********************    DOCTOR MODULE END ********************************


// ********************    NOTICE MODULE START ********************************
Route::get( '/notice/add_new', [ NoticeController::class, 'create'] )->name('notice_added_form');
Route::post( '/notice/add_new/post', [ NoticeController::class, 'store'] )->name('notice_added_save');
Route::get( '/notice/list', [ NoticeController::class, 'index'] )->name('notice_list');


Route::post( '/notice/update/post/{id}', [ NoticeController::class, 'update'] )->name('notice_update_save');
Route::get( '/notice/show/{id}', [ NoticeController::class, 'show'] )->name('notice_show');
Route::get( '/notice/edit/{id}', [ NoticeController::class, 'edit'] )->name('notice_edit');
// Route::get( '/notice/delete/{id}', [ NoticeController::class, 'destroy'] )->name('notice_delete');

// ********************    NOTICE MODULE END ********************************


// ********************    INVOICE MODULE START ********************************
Route::get( '/invoice/add_new', [ InvoiceController::class, 'create'] )->name('invoice_added_form');
Route::post( '/invoice/add_new/post', [ InvoiceController::class, 'store'] )->name('invoice_added_save');
Route::post( '/invoice/update/{id}', [ InvoiceController::class, 'update'] )->name('invoice_update');
Route::get( '/invoice/list', [ InvoiceController::class, 'index'] )->name('invoice_list');




Route::get( '/invoice/invoice_view/{id}', [ InvoiceController::class, 'invoiceView'] )->name('single_view_invoice');
Route::get( '/invoice/edit_invoice/{id}', [ InvoiceController::class, 'invoiceEdit'] )->name('single_edit_invoice');


Route::get( '/get_product_service_list', [ InvoiceController::class, 'get_product_service_list'] )->name('get_product_service_list');

// Route::get( '/invoice/invoice_delete/{id}', [ InvoiceController::class, 'destroy'] )->name('single_delete_invoice');







Route::post( '/retrieve_service', [ InvoiceController::class, 'retrieve_service'] )->name('retrieve_service');
Route::get( '/get/retrieve_service', [ InvoiceController::class, 'get_retrieve_service'] )->name('get_retrieve_service');

Route::get( '/get_patient_list_based_patient_id/{id}', [ InvoiceController::class, 'get_patient_list_based_patient_id'] )->name('get_patient_list_based_patient_id');
// ********************    INVOICE MODULE END ********************************


// ********************    PATIENT MODULE START ********************************

Route::get( '/patient/add_new', [ PatientController::class, 'create'] )->name('patient_registration_form');
Route::post( '/patient/add_new/post', [ PatientController::class, 'store'] )->name('patient_registration_save');
Route::get( '/patient/list', [ PatientController::class, 'index'] )->name('patient_list');

Route::post( '/patient/update/post/{id}', [ PatientController::class, 'update'] )->name('patient_update_save');
Route::get( '/patient/show/{id}', [ PatientController::class, 'show'] )->name('patient_show');
Route::get( '/patient/edit/{id}', [ PatientController::class, 'edit'] )->name('patient_edit');
// Route::get( '/patient/delete/{id}', [ PatientController::class, 'destroy'] )->name('patient_delete');
Route::get( '/patient/service/history/{id}', [ PatientController::class, 'service_history'] )->name('patient_service_history');


// ********************    PATIENT MODULE END ********************************


// ********************    Report MODULE START ********************************
Route::get( '/report/payment', [ ReportController::class, 'payment_report'] )->name('payment_report_index');
Route::get( '/report/payment/filter', [ ReportController::class, 'payment_report_filter'] )->name('payment_report_filter');


Route::get( '/report/patient', [ ReportController::class, 'patient_report'] )->name('patient_report_index');
Route::get( '/report/patient/filter', [ ReportController::class, 'patient_report_filter' ] )->name('patient_report_filter');


Route::get( '/report/appointment', [ ReportController::class, 'appoinment_report'] )->name('appoinment_report_index');
Route::get( '/report/appointment/filter', [ ReportController::class, 'appoinment_report_filter'] )->name('appoinment_report_filter');


Route::get( '/report/graphical', [ ReportController::class, 'graphical_report_all'] )->name('graphical_report_all');

// ********************    Report MODULE END ********************************


// ********************    ClinicSetting MODULE START ********************************
Route::get( '/clinic/info', [ ClinicSettingController::class, 'index'] )->name('clinic_info');
Route::post( '/clinic/info/updated', [ ClinicSettingController::class, 'update'] )->name('clinic_info_update');

Route::get( '/clinic/add/user', [ ClinicSettingController::class, 'add_new_user'] )->name('add_new_user');
Route::post( '/clinic/add/user/post', [ ClinicSettingController::class, 'add_new_user_post'] )->name('add_new_user_post');

Route::get( '/clinic/user/list', [ ClinicSettingController::class, 'user_list'] )->name('user_list');
Route::get( '/clinic/user/edit/{id}', [ ClinicSettingController::class, 'clinic_user_edit'] )->name('clinic_user_edit');
Route::post( '/clinic/user/update/{id}', [ ClinicSettingController::class, 'clinic_update_user'] )->name('clinic_update_user');



// ********************    ClinicSetting MODULE END ********************************


