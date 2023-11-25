<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DoctorDashboardController;
use App\Http\Controllers\Dashboard\DiagnosisController;
use App\Http\Controllers\Dashboard\DoctorRayController;
use App\Http\Controllers\Dashboard\PatientDetailsController;
use App\Http\Controllers\Dashboard\DoctorLaboratories;
Route::get('/dashboard/doctor', function () {
    return view('dashboard.doctor.dashboard');
})->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');


#############################ADMIN ROUTES#############################################
Route::middleware(['auth:doctor'])->group(function () {
    Route::prefix('doctor')->group(function(){
       Route::resource('invoicess', DoctorDashboardController::class);
       Route::get('completed_invoices', [DoctorDashboardController::class, 'completed_invoices'])->name('completed_invoicess');
       Route::get('review_invoices', [DoctorDashboardController::class, 'review_invoices'])->name('review_invoices');
       Route::post('add_review', [DiagnosisController::class, 'add_review'])->name('add_review');
       Route::resource('diagnosis', DiagnosisController::class);
       Route::resource('rays', DoctorRayController::class);
       Route::get('/patient_details/{id}', [PatientDetailsController::class, 'index'])->name('patient_details');
       Route::resource('laboratories', DoctorLaboratories::class);
    });
});

require __DIR__ . '/auth.php';
