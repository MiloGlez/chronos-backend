<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Stop\UpdateStopController;
use App\Http\Controllers\Job\GetAllJobController;
use App\Http\Controllers\Stop\GetAllStopController;
use App\Http\Controllers\Status\GetAllStatusController;
use App\Http\Controllers\Stop\CreateStopController;
use App\Http\Controllers\Time\CreateTimeController;
use App\Http\Controllers\Time\UpdateTimeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('jobs')->group(function () {
    Route::get('/', GetAllJobController::class);
});

Route::prefix('stops')->group(function () {
    Route::get('/', GetAllStopController::class);
    Route::post('/create', CreateStopController::class);
    Route::post('/update/{id}', UpdateStopController::class);
});

Route::prefix('times')->group(function () {    
    Route::post('/create', CreateTimeController::class);
    Route::post('/update/{id}', UpdateTimeController::class);

});


Route::prefix('statuses')->group(function () {
    Route::get('/', GetAllStatusController::class);
});


// Rutas de autenticación
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
