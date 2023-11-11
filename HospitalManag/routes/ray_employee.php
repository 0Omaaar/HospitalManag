<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard/ray_employee', function () {
    return view('dashboard.ray_employee_dashboard.dashboard');
})->middleware(['auth:ray_employee', 'verified'])->name('dashboard.ray_employee');


#############################Ray employee ROUTES#############################################
Route::middleware(['auth:ray_employee'])->group(function () {
    Route::prefix('ray_employee')->group(function(){

    });
});

require __DIR__ . '/auth.php';
