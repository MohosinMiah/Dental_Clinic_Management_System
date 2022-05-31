<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

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

// ********************    DOCTOR MODULE END ********************************
