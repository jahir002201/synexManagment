<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->action([DashboardController::class, 'index']);
    });
    Route::get('/index', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'project' => ProjectController::class,
        'employee' => EmployeeController::class,
    ]);
});
