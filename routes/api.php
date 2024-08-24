<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceProjectController;
use App\Http\Controllers\Api\BlogController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//Route::apiResource('service-projects', ServiceProjectController::class);
Route::get('/projects',[ServiceProjectController::class,'index']);
Route::get('/blogs',[BlogController::class,'index']);
