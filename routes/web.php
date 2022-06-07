<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\InvoiceController;

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


// ********************    NOTICE MODULE START ********************************
Route::get( '/invoice/add_new', [ InvoiceController::class, 'create'] )->name('invoice_added_form');
Route::post( '/invoice/add_new/post', [ InvoiceController::class, 'store'] )->name('invoice_added_save');
Route::get( '/invoice/list', [ InvoiceController::class, 'index'] )->name('invoice_list');


// ********************    NOTICE MODULE END ********************************


