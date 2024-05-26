<?php

use App\Http\Controllers\Job\GetAllJobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    echo "¡Hola, mundo!";
});
