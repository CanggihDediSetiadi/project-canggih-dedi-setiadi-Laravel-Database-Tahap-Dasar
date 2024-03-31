<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;


Route::resource('employees', EmployeeController::class);
Route::get('profile', ProfileController::class)->name('profile');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});


