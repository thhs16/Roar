<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;

Route::group([ 'prefix' => 'admin', 'middleware' => ['admin', 'auth']], function(){

    Route::get('dashboard', [adminController::class, 'adminDashboard'])
            ->name('adminDashboard');

    Route::get('service/create', [adminController::class, 'createService'])
            ->name('createService');

    Route::post('service/create', [ServiceController::class, 'createServiceDB'])
            ->name('createServiceDB');

    Route::get('service/list', [ServiceController::class, 'serviceList'])
            ->name('serviceList');

    Route::get('service/detail/{service_id}', [ServiceController::class, 'serviceDetail'])
            ->name('serviceDetail');

    Route::get('service/update/{service_id}', [ServiceController::class, 'serviceUpdate'])
            ->name('serviceUpdate');

    Route::post('service/update', [ServiceController::class, 'serviceUpdateDB'])
            ->name('serviceUpdateDB');

    Route::get('service/delete/{service_id}', [ServiceController::class, 'serviceDelete'])
            ->name('serviceDelete');

    Route::get('category/create', [adminController::class, 'createCategory'])
            ->name('createCategory');

    Route::post('category/create', [adminController::class, 'createCategoryDB'])
            ->name('createCategoryDB');

    Route::get('category/list', [adminController::class, 'categoryList'])
            ->name('categoryList');

    Route::get('category/updatePage/{category_id}', [adminController::class, 'updateCategoryPage'])
            ->name('updateCategoryPage');

    Route::post('category/update', [adminController::class, 'updateCategory'])
            ->name('updateCategory');

    Route::get('category/delete/{category_id}', [adminController::class, 'categoryDelete'])
            ->name('categoryDelete');

    // The list of pending apt for Admin to approve
    Route::get('checkAppointment', [adminController::class, 'aptToCheck'])
            ->name('aptToCheck');

    Route::get('approveAptAdmin/{aptId}', [adminController::class, 'approveAptAdmin'])
            ->name('approveAptAdmin');

    // Admin Actions for Expert
    Route::get('experts/create', [TutorController::class, 'index'])
            ->name('createExperts');

    Route::get('experts/list', [TutorController::class, 'show'])
            ->name('expertList');

    Route::post('experts/info', [TutorController::class, 'store'])
            ->name('expertInfo');

    Route::get('experts/update/{expertId}', [TutorController::class, 'update'])
            ->name('updateExpert');

    Route::post('experts/update', [TutorController::class, 'updateDB'])
            ->name('updateExpertDB');

    Route::get('experts/delete/{expertId}', [TutorController::class, 'destroy'])
            ->name('deleteExpert');

    // Admin & User List
    Route::get('create', [adminController::class, 'createAdmin'])
            ->name('createAdmin');

    Route::post('create', [adminController::class, 'createAdminDB'])
            ->name('createAdminDB');

    Route::get('adminList', [adminController::class, 'adminList'])
            ->name('adminList');

    Route::get('userList', [adminController::class, 'userList'])
            ->name('userList');
            
    // Admin Profile Page
    Route::get('profile', [adminController::class, 'profile'])->name('adminProfile');

    // adminProfileUpdate
    Route::post('profile/update', [adminController::class, 'profileUpdate'])->name('adminProfileUpdate');

    // updateProfilePassword
    Route::post('profile/passwordUpdate', [adminController::class, 'updateProfilePassword'])->name('adminUpdateProfilePassword');
});






