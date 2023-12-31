<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AppointmentController;
use App\Http\Controllers\Auth\FeedbackController;
use App\Http\Controllers\Auth\ReportController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});



//authentication routes such as login, register, reset password, etc. These routes are prefixed with /login, /register, /password/reset, etc., and handle user authentication
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::post('/register', [RegisterController::class, 'create'])->name('register');

Route::controller(App\Http\Controllers\AvailabilityController::class)->group(function () {
    Route::get('createAvailability', 'createAvailability')->name('createAvailability'); //link to go to add availability page
    Route::post('/storeAvailability', 'storeAvailability')->name('storeAvailability'); //link to store the availability data to the database
    Route::get('viewAvailability', 'ListAvailability')->name('ListAvailability'); //link to go to view list availability

});

Route::controller(App\Http\Controllers\AppointmentController::class)->group(function () {
    Route::get('createAppointment', 'createAppointment')->name('createAppointment'); //link to go to add appointment page
    Route::get('indexAppointment', 'indexAppointment')->name('indexAppointment'); //link to go to appointment homepage
    Route::get('viewAppointment', 'viewAppointment')->name('viewAppointment'); //link to go to view list appointment
    Route::post('/storeAppointment', 'storeAppointment')->name('storeAppointment'); //link to store the appointment data to the database
});

Route::controller(App\Http\Controllers\FeedbackController::class)->group(function () {
    Route::get('createFeedback', 'createFeedback')->name('createFeedback'); //link to go to add feedback page
    Route::get('viewFeedback', 'listFeedback')->name('listFeedback'); //link to go to view list availability

});

Route::controller(App\Http\Controllers\ReportController::class)->group(function () {
    Route::get('createReport', 'createReport')->name('createReport'); //link to go to add report page
    Route::get('viewReport', 'listReport')->name('listReport'); //link to go to view list availability

});