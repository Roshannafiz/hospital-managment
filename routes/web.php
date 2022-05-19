<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| Frontend Controller Here
|--------------------------------------------------------------------------
*/
Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index']);
Route::get('/home', [\App\Http\Controllers\Frontend\HomeController::class, 'redirect'])->middleware('auth', 'verified');
Route::get('/about-us', [\App\Http\Controllers\Frontend\AboutController::class, 'index']);
Route::get('/our-doctor', [\App\Http\Controllers\Frontend\DoctorController::class, 'index']);
Route::get('/news', [\App\Http\Controllers\Frontend\NewsController::class, 'index']);
Route::get('/contact-us', [\App\Http\Controllers\Frontend\ContactController::class, 'index']);

Route::post('/appointment', [\App\Http\Controllers\Frontend\AppointmectController::class, 'appointment']);
Route::get('/my-appointment', [\App\Http\Controllers\Frontend\AppointmectController::class, 'my_appointment']);
Route::get('/cancel-appoint/{id}', [\App\Http\Controllers\Frontend\AppointmectController::class, 'cancel_appoint']);


/*
|--------------------------------------------------------------------------
| Admin Route Here
|--------------------------------------------------------------------------
*/

// Speciality Route
Route::get('/specialities', [\App\Http\Controllers\Admin\SpecialityController::class, 'index']);
Route::get('/speciality-create', [\App\Http\Controllers\Admin\SpecialityController::class, 'speciality_create']);
Route::post('/speciality-store', [\App\Http\Controllers\Admin\SpecialityController::class, 'store']);
Route::get('/speciality-edit/{id}', [\App\Http\Controllers\Admin\SpecialityController::class, 'edit']);
Route::put('speciality-update/{id}', [\App\Http\Controllers\Admin\SpecialityController::class, 'update']);
Route::delete('speciality-delete/{id}', [\App\Http\Controllers\Admin\SpecialityController::class, 'destroy']);


// Doctor Route
Route::get('/doctors', [\App\Http\Controllers\Admin\DoctorController::class, 'index']);
Route::get('/doctor-create', [\App\Http\Controllers\Admin\DoctorController::class, 'doctor_create']);
Route::post('/doctor-store', [\App\Http\Controllers\Admin\DoctorController::class, 'store']);
Route::get('/doctor-edit/{id}', [\App\Http\Controllers\Admin\DoctorController::class, 'edit']);
Route::put('doctor-update/{id}', [\App\Http\Controllers\Admin\DoctorController::class, 'update']);
Route::delete('doctor-delete/{id}', [\App\Http\Controllers\Admin\DoctorController::class, 'destroy']);
Route::get('/doctor-status', [\App\Http\Controllers\Admin\DoctorController::class, 'change_status'])->name('doctor-status');


// Appointment Route
Route::get('/all-appointments', [\App\Http\Controllers\Admin\AppointmentController::class, 'all_appointment']);
Route::get('/appoint-approved/{id}', [\App\Http\Controllers\Admin\AppointmentController::class, 'appoint_approved']);
Route::get('/appoint-cancel/{id}', [\App\Http\Controllers\Admin\AppointmentController::class, 'appoint_cancel']);
Route::delete('/appoint-delete/{id}', [\App\Http\Controllers\Admin\AppointmentController::class, 'destroy']);


// Send Mail Route
Route::get('/send-mail/{id}', [\App\Http\Controllers\Admin\SendMailController::class, 'index']);
Route::post('/send-email/{id}', [\App\Http\Controllers\Admin\SendMailController::class, 'send_email']);





