<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;

Route::group([], function () {
   Route::get('dashboard', [DashboardController::class, 'index']);
   Route::resource('user', UserController::class)->only('index');
});