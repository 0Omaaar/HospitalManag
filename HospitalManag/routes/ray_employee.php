<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ray_employee_dashboard\InvoicesController;

Route::get('/dashboard/ray_employee', function () {
    return view('dashboard.ray_employee_dashboard.dashboard');
})->middleware(['auth:ray_employee', 'verified'])->name('dashboard.ray_employee');


#############################Ray employee ROUTES#############################################
Route::middleware(['auth:ray_employee'])->group(function () {

        Route::get('invoices', [InvoicesController::class, 'index'])->name('invoices.index');

});

require __DIR__ . '/auth.php';
