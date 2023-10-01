<?php

use App\Http\Controllers\Admin\Sections\SectionController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



##############################DASHBOARD###########################################
Route::get('/dashboard/admin', function () {
    return view('dashboard.admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard.admin');

Route::get('/dashboard/user', function () {
    return view('dashboard.user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.user');



#############################ADMIN ROUTES#############################################
Route::middleware(['auth:admin'])->group(function () {
    Route::resource('sections', SectionController::class);
    Route::resource('doctors', DoctorController::class);
    Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
});

require __DIR__ . '/auth.php';