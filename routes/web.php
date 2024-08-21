<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::post('store', [AdminController::class, 'store'])->name('store');

Route::post('/upload_doctor', [AdminController::class, 'upload']);
Route::get('/myappointment', [AppointmentController::class, 'myappointment']);
Route::get('/appointment', [AppointmentController::class, 'create']);
Route::post('/appointment', [AppointmentController::class, 'appointment']);

Route::get('/cancel_appoint/{id}', [AppointmentController::class, 'cancel_appoint']);

Route::get('/showAppointment', [AdminController::class, 'showAppointment']);
Route::get('/approved/{id}', [AdminController::class, 'approved']);
Route::get('/cancel/{id}', [AdminController::class, 'cancel']);
Route::get('/showdoctor', [AdminController::class, 'showdoctor']);
Route::get('/deleteDoctor/{id}', [AdminController::class, 'deleteDoctor']);
Route::get('/updateDoctor/{id}', [AdminController::class, 'updateDoctor']);
Route::post('/editDoctor/{id}', [AdminController::class, 'editDoctor']);

Route::get('/create', [HospitalController::class, 'create']);
Route::post('/hospital/store', [HospitalController::class, 'store'])->name('hospital.store');
Route::get('/HospitalLocation', [HospitalController::class, 'HospitalLocation'])->name('hospital.HospitalLocation');
