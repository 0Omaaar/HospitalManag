<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

///////////////PATIENT ROUTES//////////////////////
Route::post('login/patient', [\App\Http\Controllers\Auth\PatientController::class, 'store'])->middleware('guest')->name('login.patient');
Route::post('logout/patient', [\App\Http\Controllers\Auth\PatientController::class, 'destroy'])->middleware('auth:patient')
    ->name('logout.patient');

///////////////ADMIN ROUTES//////////////////////

Route::post('login/admin', [AdminController::class, 'store'])->middleware('guest')->name('login.admin');
Route::post('logout/admin', [AdminController::class, 'destroy'])->middleware('auth:admin')
    ->name('logout.admin');

///////////////DOCTOR ROUTES//////////////////////

Route::post('login/doctor', [\App\Http\Controllers\Auth\DoctorController::class, 'store'])->middleware('guest')->name('login.doctor');
Route::post('logout/doctor', [\App\Http\Controllers\Auth\DoctorController::class, 'destroy'])->middleware('auth:doctor')
    ->name('logout.doctor');


///////////////RAYEMPLOYEE ROUTES//////////////////////

Route::post('login/ray_employee', [\App\Http\Controllers\Auth\RayEmployeeController::class, 'store'])->middleware('guest')->name('login.ray_employee');
Route::post('logout/ray_employee', [\App\Http\Controllers\Auth\RayEmployeeController::class, 'destroy'])->middleware('auth:ray_employee')
    ->name('logout.ray_employee');


///////////////LABORATORIE ROUTES//////////////////////

Route::post('login/laboratorie_employee', [\App\Http\Controllers\Auth\LaboratorieEmployeeController::class, 'store'])->middleware('guest')->name('login.laboratorie_employee');
Route::post('logout/laboratorie_employee', [\App\Http\Controllers\Auth\LaboratorieEmployeeController::class, 'destroy'])->middleware('auth:laboratorie_employee')
    ->name('logout.laboratorie_employee');




Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create']);

    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

    // Users Routes
    Route::get('/user/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.user');





    //
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');


    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout.user');



});
