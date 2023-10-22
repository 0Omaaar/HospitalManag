<?php

use App\Http\Controllers\Admin\Ambulances\AmbulanceController;
use App\Http\Controllers\Admin\Finance\PaymentController;
use App\Http\Controllers\Admin\Finance\ReceiptAccountController;
use App\Http\Controllers\Admin\Insurances\InsuranceController;
use App\Http\Controllers\Admin\Patients\PatientController;
use App\Http\Controllers\Admin\Sections\SectionController;
use App\Http\Controllers\Admin\Services\SingleServiceController;
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

Route::get('/dashboard/doctor', function () {
    return view('dashboard.doctor.dashboard');
})->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');


#############################ADMIN ROUTES#############################################
Route::middleware(['auth:admin'])->group(function () {

    Route::resource('sections', SectionController::class);

    Route::resource('doctors', DoctorController::class);
    Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
    Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');

    Route::resource('service', SingleServiceController::class);

    Route::view('add_groupServices', 'livewire.GroupServices.include_create')->name('add_groupServices');

    Route::resource('insurance', InsuranceController::class);

    Route::resource('ambulance', AmbulanceController::class);

    Route::resource('patient', PatientController::class);

    Route::view('single_invoices', 'livewire.singleInvoices.index')->name('single_invoices');

    Route::view('group_invoices', 'livewire.groupInvoices.index')->name('group_invoices');

    Route::view('print_single_invoices','livewire.singleInvoices.print')->name('print_single_invoices');

    Route::view('print_group_invoices','livewire.groupInvoices.print')->name('group_Print_group_invoices');

    Route::resource('receipt', ReceiptAccountController::class);

    Route::resource('payment', PaymentController::class);
});

require __DIR__ . '/auth.php';
