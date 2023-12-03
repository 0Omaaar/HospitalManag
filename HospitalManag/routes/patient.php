<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard/patient', function () {
    return view('dashboard.patient.dashboard');
})->middleware(['auth:patient', 'verified'])->name('dashboard.patient');


#############################Ray employee ROUTES#############################################
Route::middleware(['auth:patient'])->group(function () {
    Route::get('/patient/invoices', [\App\Http\Controllers\PatientDashboard\PatientController::class, 'invoices'])->name('invoices.patient');
    Route::get('/patient/laboratories', [\App\Http\Controllers\PatientDashboard\PatientController::class,'laboratories'])->name('laboratories.patient');
});

require __DIR__ . '/auth.php';
