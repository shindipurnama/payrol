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
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    Route::get('/staff', [StaffController::class, 'index']);
    Route::get('/staff/get', [StaffController::class, 'get']);

    Route::get('/absence', [AbsenceController::class, 'index']);
    Route::get('/permission', [PermissionController::class, 'index']);
    Route::get('/overtime', [OvertimeController::class, 'index']);
    Route::get('/payroll', [PayrollController::class, 'index']);
    Route::get('/payroll/create', [PayrollController::class, 'create']);
});