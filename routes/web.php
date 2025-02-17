<?php

use App\Models\Tutor;
// use App\Http\Controllers\adminController;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('user.home');
});

Route::get('/dashboard', function () {

    $service = Service::get();

    $expert = Tutor::get();

    $category = Category::get();

    // dd($category->toArray());

    return view('user.home', compact('service', 'expert', 'category') );
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



