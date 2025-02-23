<?php

use App\Models\Tutor;
// use App\Http\Controllers\adminController;
use App\Models\Rating;
use App\Models\Service;
use App\Models\Category;
use App\Models\Appointment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\AppointmentController;




// auth
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::get('/', function () {
    if(auth()->user()->role == 'superAdmin' | auth()->user()->role == 'admin'){
        return to_route('adminDashboard');

    }

    if(auth()->user()->role == 'expert'){
        return to_route('expertDashboard');
    }

    if(auth()->user()->role == 'user'){
        return to_route('dashboard');
    }
});

require __DIR__.'/auth.php';

    // // Socialite
    // Route::get('/auth/{provider}/redirect', [ProviderController::class,'redirect']);
    // Route::get('/auth/{provider}/callback', [ProviderController::class,'callback']);




