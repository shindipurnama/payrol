<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', function() {
    return view("auth/login");
});
Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/staff', StaffController::class);
    Route::resource('/absence', AbsenceController::class);
    Route::resource('/permission', PermissionController::class);
    Route::resource('/overtime', OvertimeController::class);
    Route::resource('/payroll', PayrollController::class);
});