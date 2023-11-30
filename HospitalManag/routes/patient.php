<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard/patient', function () {
    return view('dashboard.patient.dashboard');
})->middleware(['auth:patient', 'verified'])->name('dashboard.patient');


#############################Ray employee ROUTES#############################################
Route::middleware(['auth:patient'])->group(function () {

});

require __DIR__ . '/auth.php';
