<?php

use App\Http\Controllers\ElectricityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;


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


    Route::get('/electricity', [ElectricityController::class, 'index'])->name('electricity');
    Route::get('/electricity/details', [ElectricityController::class, 'show'])->name('electricity.show');
    Route::post('/electricity', [ElectricityController::class, 'store'])->name('electricity.store');
    Route::get('/electricity/edit/{electricity}', [ElectricityController::class, 'edit'])->name('electricity.edit');
    Route::post('/electricity/{electricity}', [ElectricityController::class, 'update'])->name('electricity.update');
    Route::delete('/electricity/{electricity}', [ElectricityController::class, 'destroy'])->name('electricity.destroy');
});





