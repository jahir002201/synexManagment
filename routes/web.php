<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\TaskController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->action([DashboardController::class, 'index']);
    });





    Route::get('/users', [HomeController::class, 'users'])->name('users');
    Route::get('/index', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'project' => ProjectController::class,
        'employee' => EmployeeController::class,
        'client' => ClientController::class,
        'department' => DepartmentController::class,
        'expenses' => ExpensesController::class,



    ]);
});
