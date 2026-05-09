<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Sdm\BusinessTripController;
use App\Http\Controllers\Sdm\CitiesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [AuthController::class,'login'])->name('login');
Route::post('/actionlogin', [AuthController::class, 'actionLogin'])->name('action.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    
    
    // Route prefix untuk Produsen

    Route::prefix('admin')->name('admin.')->middleware('CekUserLogin:1')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::put('/update-role/{id}', [AdminController::class, 'updateRole'])->name('update.role');
    });
    

    Route::prefix('employee')->name('employee.')->middleware('CekUserLogin:2')->group(function () {
        Route::get('/business-trips', [EmployeeController::class, 'businessTrips'])->name('business.trips');
        Route::post('/business-trips/create', [EmployeeController::class, 'createBusinessTrips'])->name('business.trips.create');
    });

    Route::prefix('sdm')->name('sdm.')->middleware('CekUserLogin:3')->group(function () {
        Route::get('/cities', [CitiesController::class, 'cities'])->name('cities');
        Route::post('/cities-create', [CitiesController::class, 'create'])->name('cities.create');
        Route::put('/cities-update/{id}', [CitiesController::class, 'update'])->name('cities.update');
        Route::delete('/cities-delete/{id}', [CitiesController::class, 'delete'])->name('cities.delete');

        Route::get('/business-trip', [BusinessTripController::class, 'approvalRequest'])->name('business.trip');
        Route::put('/business-trip/approval/{id}', [BusinessTripController::class, 'approval'])->name('business.trip.approval');
        Route::get('/business-trip/approval-history', [BusinessTripController::class, 'approvalHistory'])->name('business.trip.approval.history');
    });

});