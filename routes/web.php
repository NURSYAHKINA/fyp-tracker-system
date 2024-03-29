<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;

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

// Route::post('/register', [RegisterController::class, 'create'])->name('register');

Route::controller(AvailabilityController::class)->group(function () {
    Route::get('indexAvailability', 'indexAvailability')->name('indexAvailability'); //link to go to appointment homepage
    Route::get('createAvailability', 'createAvailability')->name('createAvailability'); //link to go to add availability page
    Route::post('/storeAvailability', 'storeAvailability')->name('storeAvailability'); //link to store the availability data to the database
    Route::post('checkAvailability', 'checkAvailability')->name('checkAvailability'); //link to check the availability data from the database
    Route::post('updateAvailability', 'updateAvailability')->name('updateAvailability'); //link to update the availability data from the database
    Route::get('viewAvailability/{id}', 'ListAvailability')->name('ListAvailability'); //link to go to view list availability
    Route::get('ListAvailable/{id}', 'ListAvailability')->name('ListAvailability'); //link to go to view list availability
    Route::delete('deleteAvailability/{id}', 'deleteAvailability')->name('deleteAvailability'); //link to delete the data from the database
});

Route::controller(AppointmentController::class)->group(function () {
    // Route::get('createAppointment', 'createAppointment')->name('createAppointment'); //link to go to add appointment page
    Route::get('indexAppointment', 'indexAppointment')->name('indexAppointment'); //link to go to appointment homepage
    Route::get('viewAppointment/{id}', 'viewAppointment')->name('viewAppointment'); //link to go to view list appointment
    Route::post('/storeAppointment', 'storeAppointment')->name('storeAppointment'); //link to store the appointment data to the database
    Route::post('updateAppointment/{id}', 'updateAppointment')->name('updateAppointment'); //link to update the availability data from the database
    Route::get('editAppointment/{id}', 'editAppointment')->name('editAppointment'); //link to go to edit page
    Route::delete('deleteAppointment/{id}', 'deleteAppointment')->name('deleteAppointment'); //link to delete the data from the database
    Route::post('/updateAppointmentStatus/{id}', 'updateStatus')->name('updateStatus'); //update approve status
    Route::post('/updateAppointmentStatusReject/{id}', 'updateStatusReject')->name('updateStatusReject'); //update approve status
    Route::post('/appointmentdata', 'appointmentdata')->name('appointmentdata');
    Route::get('/AddAppointment', 'AddAppointment')->name('AddAppointment');
    Route::get('ListAppointment', 'ListAppointment')->name('ListAppointment'); //link to go to view list availability


});

Route::controller(FeedbackController::class)->group(function () {
    Route::get('indexFeedback', 'indexFeedback')->name('indexFeedback'); //link to go to appointment homepage
    Route::get('AddFeedback', 'AddFeedback')->name('AddFeedback'); //link to go to add feedback page
    Route::get('viewFeedback/{id}', 'viewFeedback')->name('viewFeedback'); //link to go to view list feedback
    Route::post('/storeFeedback', 'storeFeedback')->name('storeFeedback'); //link to store the appointment data to the database
    Route::get('editFeedback/{id}', 'editFeedback')->name('editFeedback'); //link to go to edit page
    Route::post('updateFeedback/{id}', 'updateFeedback')->name('updateFeedback'); //link to update the availability data from the database
    Route::delete('deleteFeedback/{id}', 'deleteFeedback')->name('deleteFeedback'); //link to delete the data from the database
    Route::get('ListFeedback', 'ListFeedback')->name('ListFeedback'); //link to go to view list availability
});

Route::controller(ReportController::class)->group(function () {
    Route::get('indexReport', 'indexReport')->name('indexReport'); //link to go to appointment homepage
    Route::get('addReport', 'addReport')->name('addReport'); //link to go to add report page
    Route::get('viewReport/{id}', 'viewReport')->name('viewReport'); //link to go to view list availability
    Route::post('/storeReport', 'storeReport')->name('storeReport'); //link to store the appointment data to the database
    Route::get('editReport/{id}', 'editReport')->name('editReport'); //link to go to edit page
    Route::post('updateReport/{id}', 'updateReport')->name('updateReport'); //link to update the availability data from the database
    Route::delete('deleteReport/{id}', 'deleteReport')->name('deleteReport'); //link to delete the data from the database
    Route::get('ListReport', 'ListReport')->name('ListReport'); //link to go to view list availability
});

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboardCount', 'count')->name('count'); //To count 
    Route::get('/List_User', 'ListUser')->name('ListUser'); //link to view list of users
    Route::get('/List_Student', 'ListStudent')->name('ListStudent'); //link to view list of users
    Route::delete('deleteUser/{id}', 'App\Http\Controllers\UserController@deleteUser')->name('deleteUser'); //link to delete the data from the database
    Route::get('viewUser/{id}', 'viewUser')->name('viewUser'); //link to go to edit page
    Route::get('editUser/{id}', 'editUser')->name('editUser'); //link to go to edit page
    Route::post('/updateAvatar', 'updateAvatar')->name('updateAvatar');
    Route::post('/updatePassword', 'updatePassword')->name('updatePassword');
    Route::post('/updateAvatar', 'updateAvatar')->name('updateAvatar');
    Route::put('updateUser/{id}', 'App\Http\Controllers\UserController@updateUser')->name('updateUser'); //link to update the data in the database
    Route::post('/updatePassword', 'updatePassword')->name('updatePassword');
    Route::post('/toggle-user-status/{id}', 'toggleUserStatus')->name('toggleUserStatus');
});
