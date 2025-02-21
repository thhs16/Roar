<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\AppointmentController;

// expert
Route::group([ 'prefix' => 'expert', 'middleware' => ['expert', 'auth']], function(){

    Route::get('dashboard', [TutorController::class, 'expertDashboard'])
            ->name('expertDashboard');

    Route::get('apt/add', [TutorController::class, 'addAptTime'])
            ->name('addAptTime');

    Route::post('apt/create', [AppointmentController::class, 'create'])
            ->name('createApt');

    Route::get('apt/list', [AppointmentController::class, 'show'])
            ->name('aptList');
    // expert profile
    Route::get('profile', [TutorController::class, 'profile'])->name('expertProfile');

    // expertProfileUpdate
    Route::post('profile/update', [TutorController::class, 'profileUpdate'])->name('expertProfileUpdate');

    // updateProfilePassword
    Route::post('profile/passwordUpdate', [TutorController::class, 'updateProfilePassword'])->name('expertUpdateProfilePassword');
});
