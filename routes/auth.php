<?php


use App\Http\Controllers\Auth\EmailVerificationPrompController;
use App\Http\Controllers\Auth\EmailVerifycationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;

use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('verify-email', EmailVerificationPrompController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerifycationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});



