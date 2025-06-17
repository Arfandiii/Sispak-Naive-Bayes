<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Http\Controllers\DataManagementController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CareerStatementController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\StudentAnswersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/konsultasi', [StudentAnswersController::class, 'index'])->name('konsultasi');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('data', DataManagementController::class);
        Route::resource('career', CareerController::class);
        Route::resource('career-statement', CareerStatementController::class);
        Route::resource('rule', RuleController::class);
    });
    
    Route::middleware(['role:user'])->name('user.')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::resource('student-answers', StudentAnswersController::class);
        Route::get('/results', [StudentAnswersController::class, 'showResults'])->name('results');
    });
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});