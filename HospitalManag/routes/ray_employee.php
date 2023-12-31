<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ray_employee_dashboard\InvoicesController;

Route::get('/dashboard/ray_employee', function () {
    return view('dashboard.ray_employee_dashboard.dashboard');
})->middleware(['auth:ray_employee', 'verified'])->name('dashboard.ray_employee');


#############################Ray employee ROUTES#############################################
Route::middleware(['auth:ray_employee'])->group(function () {
    Route::resource('invoices', InvoicesController::class);
    Route::get('completed_invoices', [InvoicesController::class, 'completed_invoices'])->name('completed_invoices');
});

require __DIR__ . '/auth.php';
