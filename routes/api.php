<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Job\GetAllJobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('jobs')->group(function () {
    Route::get('/', GetAllJobController::class);
});

// Rutas de autenticación
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
