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
    Route::get('/patientt/rays', [PatientController::class, 'rays'])->name('rays.patient');
    Route::get('/patientt/view_rays/{id}', [PatientController::class,'viewRays'])->name('rays.view');
    Route::get('/patientt/payments', [PatientController::class,'payments'])->name('payments.patient');
});

require __DIR__ . '/auth.php';
