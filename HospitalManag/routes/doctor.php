<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DoctorDashboardController;
use App\Http\Controllers\Dashboard\DiagnosisController;
Route::get('/dashboard/doctor', function () {
    return view('dashboard.doctor.dashboard');
})->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');


#############################ADMIN ROUTES#############################################
Route::middleware(['auth:doctor'])->group(function () {
    Route::prefix('doctor')->group(function(){
       Route::resource('invoices', DoctorDashboardController::class);
       Route::get('completed_invoices', [DoctorDashboardController::class, 'completed_invoices'])->name('completed_invoices');
       Route::resource('diagnosis', DiagnosisController::class);
    });
});

require __DIR__ . '/auth.php';
