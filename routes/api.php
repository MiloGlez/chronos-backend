<?php

use App\Http\Controllers\Job\GetAllJobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('jobs')->group(function () {
    Route::get('/', GetAllJobController::class);
});