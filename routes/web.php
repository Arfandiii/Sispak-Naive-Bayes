<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DataManagementController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CareerStatementController;
use App\Http\Controllers\Admin\RuleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\KonsultasiController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::patch('/users/{user}/verify', [UserController::class, 'verify'])->name('users.verify');
        Route::resource('data', DataManagementController::class);
        Route::resource('career', CareerController::class);
        Route::resource('career-statement', CareerStatementController::class);
        Route::resource('rule', RuleController::class);
    });
    
    Route::middleware(['role:user'])->name('user.')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [UserDashboardController::class, 'profile'])->name('dashboard.profile');
        Route::get('/profile/edit', [UserDashboardController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update', [UserDashboardController::class, 'update'])->name('profile.update');
        Route::get('/result-detail/{career_id}', [UserDashboardController::class, 'resultDetail'])->name('konsultasi.resultDetail');
        Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi.index');
        Route::post('/konsultasi', [KonsultasiController::class, 'store'])->name('konsultasi.store');
        Route::match(['get', 'post'],'/konsultasi/proses', [KonsultasiController::class, 'proses'])->name('konsultasi.proses');
        Route::get('/konsultasi-result', [KonsultasiController::class, 'result'])->name('konsultasi.result');
    });
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
