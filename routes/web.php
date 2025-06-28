<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('users', App\Http\Controllers\UserController::class);

Route::resource('statuses', App\Http\Controllers\StatusController::class);

Route::resource('vehicles', App\Http\Controllers\VehicleController::class);

Route::resource('services', App\Http\Controllers\ServiceController::class);

Route::resource('bills', App\Http\Controllers\BillController::class);
