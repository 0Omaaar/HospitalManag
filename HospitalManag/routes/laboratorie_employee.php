<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard/laboratorie_employee', function () {
    return view('dashboard.laboratorie_employee_dashboard.dashboard');
})->middleware(['auth:laboratorie_employee', 'verified'])->name('dashboard.laboratorie_employee');


#############################Ray employee ROUTES#############################################
Route::middleware(['auth:laboratorie_employee'])->group(function () {

});

require __DIR__ . '/auth.php';
