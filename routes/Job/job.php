<?php

use App\Http\Controllers\Job\GetAllJobController;
use Illuminate\Support\Facades\Route;

Route::prefix('jobs')->group(function () {

    Route::get('/', GetAllJobController::class);
    
 
});