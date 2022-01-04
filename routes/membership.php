<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Membership\FcmController;
use App\Http\Controllers\Api\V1\Membership\LoginController;
use App\Http\Controllers\Api\V1\Membership\OtpController;
use App\Http\Controllers\Api\V1\Membership\RegisterController;

Route::group([], function () {
    Route::post('register', [RegisterController::class, 'store']);
    Route::post('login', [LoginController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::patch('fcm', [FcmController::class, 'store']);
        Route::get('user', function (Request $request) {
            return $request->user();
        });
    });

    Route::prefix('otp')->group(function () {
        Route::post('request', [OtpController::class, 'store'])->middleware('is-reached-max');
        Route::post('check', [OtpController::class, 'check']);
    });
});
