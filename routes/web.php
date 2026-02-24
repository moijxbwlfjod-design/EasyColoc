<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('login')->name('login')->group(function(){
    Route::get('/', [AuthController::class, 'login_ui']);
    Route::post('/', [AuthController::class, 'login']);
});