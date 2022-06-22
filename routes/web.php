<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PatientController;
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
});


// ********************    DOCTOR MODULE START ********************************

Route::get( '/doctor/register', [ DoctorController::class, 'create'] )->name('doctor_registration_form');
Route::post( '/doctor/register/post', [ DoctorController::class, 'store'] )->name('doctor_registration_save');
Route::get( '/doctor/list', [ DoctorController::class, 'index'] )->name('doctor_list');


// ********************    DOCTOR MODULE END ********************************


// ********************    NOTICE MODULE START ********************************
Route::get( '/notice/add_new', [ NoticeController::class, 'create'] )->name('notice_added_form');
Route::post( '/notice/add_new/post', [ NoticeController::class, 'store'] )->name('notice_added_save');
Route::get( '/notice/list', [ NoticeController::class, 'index'] )->name('notice_list');


// ********************    NOTICE MODULE END ********************************


// ********************    INVOICE MODULE START ********************************
Route::get( '/invoice/add_new', [ InvoiceController::class, 'create'] )->name('invoice_added_form');
Route::post( '/invoice/add_new/post', [ InvoiceController::class, 'store'] )->name('invoice_added_save');
Route::post( '/invoice/update/{id}', [ InvoiceController::class, 'update'] )->name('invoice_update');
Route::get( '/invoice/list', [ InvoiceController::class, 'index'] )->name('invoice_list');


Route::get( '/invoice/invoice_view/{id}', [ InvoiceController::class, 'invoiceView'] )->name('single_view_invoice');
Route::get( '/invoice/edit_invoice/{id}', [ InvoiceController::class, 'invoiceEdit'] )->name('single_edit_invoice');
Route::get( '/invoice/invoice_delete/{id}', [ InvoiceController::class, 'destroy'] )->name('single_delete_invoice');







Route::post( '/retrieve_service', [ InvoiceController::class, 'retrieve_service'] )->name('retrieve_service');
Route::get( '/get/retrieve_service', [ InvoiceController::class, 'get_retrieve_service'] )->name('get_retrieve_service');


// ********************    INVOICE MODULE END ********************************


// ********************    PATIENT MODULE START ********************************

Route::get( '/patient/add_new', [ PatientController::class, 'create'] )->name('patient_registration_form');
Route::post( '/patient/add_new/post', [ PatientController::class, 'store'] )->name('patient_registration_save');
Route::post( '/patient/update/post/{id}', [ PatientController::class, 'update'] )->name('patient_update_save');
Route::get( '/patient/list', [ PatientController::class, 'index'] )->name('patient_list');

Route::get( '/patient/edit/{id}', [ PatientController::class, 'edit'] )->name('patient_edit');
Route::get( '/patient/delete/{id}', [ PatientController::class, 'destroy'] )->name('patient_delete');


// ********************    PATIENT MODULE END ********************************
