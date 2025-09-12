<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ReportController;
// dashboard routes
Route::redirect('/', '/dashboard');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

// scores routes
Route::get('/scores', [StudentController::class, 'showView'])->name('scores');
Route::post('/scores', [StudentController::class, 'search'])->name('search.submit');

// reports routes
Route::get('/reports', [ReportController::class, 'reports'])->name('reports');

// settings routes
Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
