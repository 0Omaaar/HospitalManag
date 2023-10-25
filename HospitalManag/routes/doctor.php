<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DoctorDashboardController;

Route::get('/dashboard/doctor', function () {
    return view('dashboard.doctor.dashboard');
})->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');


#############################ADMIN ROUTES#############################################
Route::middleware(['auth:doctor'])->group(function () {
    Route::prefix('doctor')->group(function(){
       Route::resource('invoices', DoctorDashboardController::class);
    });
});

require __DIR__ . '/auth.php';
