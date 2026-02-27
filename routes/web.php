<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColocationController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::prefix('login')->name('login')->group(function(){
    Route::get('/', [AuthController::class, 'login_ui']);
    Route::post('/', [AuthController::class, 'login']);
});

Route::prefix('register')->name('register')->group(function(){
    Route::get('/', [AuthController::class, 'register_ui']);
    Route::post('/', [AuthController::class, 'register']);
});

Route::middleware('auth')->prefix('home')->name('home.')->group(function(){
    Route::get('/', [AuthController::class, 'index'])->name('index');
    
    Route::prefix('colocation')->name('colocation.')->group(function(){
        Route::get('/', [ColocationController::class, 'index'])->name('index');
        Route::post('/', [ColocationController::class, 'create'])->name('create');
    });
});

