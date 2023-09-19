<?php

use App\Http\Controllers\Admin\Sections\SectionController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| backEnd Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/dashboard/admin', [DashboardController::class, 'index']);


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
});

require __DIR__ . '/auth.php';