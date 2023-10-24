<?php

use Illuminate\Support\Facades\Route;


Route::get('/dashboard/doctor', function () {
    return view('dashboard.doctor.dashboard');
})->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');


#############################ADMIN ROUTES#############################################
Route::middleware(['auth:doctor'])->group(function () {

});

require __DIR__ . '/auth.php';
