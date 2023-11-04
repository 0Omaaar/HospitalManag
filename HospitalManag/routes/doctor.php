<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DoctorDashboardController;
use App\Http\Controllers\Dashboard\DiagnosisController;
use App\Http\Controllers\Dashboard\DoctorRayController;
Route::get('/dashboard/doctor', function () {
    return view('dashboard.doctor.dashboard');
})->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');


#############################ADMIN ROUTES#############################################
Route::middleware(['auth:doctor'])->group(function () {
    Route::prefix('doctor')->group(function(){
       Route::resource('invoices', DoctorDashboardController::class);
       Route::get('completed_invoices', [DoctorDashboardController::class, 'completed_invoices'])->name('completed_invoices');
       Route::get('review_invoices', [DoctorDashboardController::class, 'review_invoices'])->name('review_invoices');
       Route::post('add_review', [DiagnosisController::class, 'add_review'])->name('add_review');
       Route::resource('diagnosis', DiagnosisController::class);
       Route::resource('rays', DoctorRayController::class);
    });
});

require __DIR__ . '/auth.php';
