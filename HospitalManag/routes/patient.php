<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientDashboard\PatientController;

Route::get('/dashboard/patient', function () {
    return view('dashboard.patient.dashboard');
})->middleware(['auth:patient', 'verified'])->name('dashboard.patient');


#############################Ray employee ROUTES#############################################
Route::middleware(['auth:patient'])->group(function () {
    Route::get('/patientt/invoices', [PatientController::class, 'invoices'])->name('invoices.patient');
    Route::get('/patientt/laboratories', [PatientController::class,'laboratories'])->name('laboratories.patient');
    Route::get('/patientt/view_laboratories/{id}', [PatientController::class,'viewLaboratories'])->name('laboratories.view');
});

require __DIR__ . '/auth.php';
