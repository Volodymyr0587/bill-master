<?php

use App\Http\Controllers\ElectricityController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Notification;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])
    ->middleware('guest')
    ->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');
Route::post('login', [LoginController::class, 'store']);



Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

    // Electricity service
    Route::get('/electricity', [ElectricityController::class, 'index'])->name('electricity');
    Route::get('/electricity/details', [ElectricityController::class, 'show'])->name('electricity.show');
    Route::post('/electricity', [ElectricityController::class, 'store'])->name('electricity.store');
    Route::get('/electricity/edit/{electricity}', [ElectricityController::class, 'edit'])->name('electricity.edit');
    Route::post('/electricity/{electricity}', [ElectricityController::class, 'update'])->name('electricity.update');
    Route::delete('/electricity/{electricity}', [ElectricityController::class, 'destroy'])->name('electricity.destroy');

    // Custom service
    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::get('/service', [ServiceController::class, 'create'])->name('service.create');
    Route::get('/service/details', [ServiceController::class, 'show'])->name('service.show');
    Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/edit/{service}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('/service/{service}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');

    // Notification
    Route::get('/notification', function() {
        $notifications = Notification::all();
        return view('notifications', compact('notifications'));
    })->name('notifications');
});





