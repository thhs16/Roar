<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;

Route::middleware(['admin', 'auth'])->group(function () {

    Route::get('admin/dashboard', [adminController::class, 'adminDashboard'])
            ->name('adminDashboard');

    Route::get('admin/service/create', [adminController::class, 'createService'])
            ->name('createService');

    Route::post('admin/service/create', [ServiceController::class, 'createServiceDB'])
            ->name('createServiceDB');

    Route::get('admin/service/list', [ServiceController::class, 'serviceList'])
            ->name('serviceList');

    Route::get('admin/service/detail/{service_id}', [ServiceController::class, 'serviceDetail'])
            ->name('serviceDetail');

    Route::get('admin/service/update/{service_id}', [ServiceController::class, 'serviceUpdate'])
            ->name('serviceUpdate');

    Route::post('admin/service/update', [ServiceController::class, 'serviceUpdateDB'])
            ->name('serviceUpdateDB');

    Route::get('admin/service/delete/{service_id}', [ServiceController::class, 'serviceDelete'])
            ->name('serviceDelete');

    Route::get('admin/category/create', [adminController::class, 'createCategory'])
            ->name('createCategory');

    Route::post('admin/category/create', [adminController::class, 'createCategoryDB'])
            ->name('createCategoryDB');

    Route::get('admin/category/list', [adminController::class, 'categoryList'])
            ->name('categoryList');

    Route::get('admin/category/updatePage/{category_id}', [adminController::class, 'updateCategoryPage'])
            ->name('updateCategoryPage');

    Route::post('admin/category/update', [adminController::class, 'updateCategory'])
            ->name('updateCategory');

    Route::get('admin/category/delete/{category_id}', [adminController::class, 'categoryDelete'])
            ->name('categoryDelete');

    Route::get('admin/checkAppointment', [adminController::class, 'aptToCheck'])
            ->name('aptToCheck');

    Route::get('admin/approveAptAdmin/{aptId}', [adminController::class, 'approveAptAdmin'])
            ->name('approveAptAdmin');

    // Admin for Expert
    Route::get('admin/experts/create', [TutorController::class, 'index'])
            ->name('createExperts');

    Route::get('admin/experts/list', [TutorController::class, 'show'])
            ->name('expertList');

    Route::post('admin/experts/info', [TutorController::class, 'store'])
            ->name('expertInfo');

    Route::get('admin/experts/update/{expertId}', [TutorController::class, 'update'])
            ->name('updateExpert');

    Route::post('admin/experts/update', [TutorController::class, 'updateDB'])
            ->name('updateExpertDB');

    Route::get('admin/experts/delete/{expertId}', [TutorController::class, 'destroy'])
            ->name('deleteExpert');

    // Admin & User List
    Route::get('admin/create', [adminController::class, 'createAdmin'])
            ->name('createAdmin');

    Route::post('admin/create', [adminController::class, 'createAdminDB'])
            ->name('createAdminDB');

    Route::get('admin/adminList', [adminController::class, 'adminList'])
            ->name('adminList');

    Route::get('admin/userList', [adminController::class, 'userList'])
            ->name('userList');

    Route::get('admin/profile', [adminController::class, 'profile'])->name('adminProfile');

    // adminProfileUpdate
    Route::post('admin/profile/update', [adminController::class, 'profileUpdate'])->name('adminProfileUpdate');

    // updateProfilePassword
    Route::post('admin/profile/passwordUpdate', [adminController::class, 'updateProfilePassword'])->name('adminUpdateProfilePassword');
});


    // expert
Route::middleware(['expert', 'auth'])->group(function () {
    Route::get('expert/dashboard', [TutorController::class, 'expertDashboard'])
            ->name('expertDashboard');

    Route::get('expert/apt/add', [TutorController::class, 'addAptTime'])
            ->name('addAptTime');

    Route::post('expert/apt/create', [AppointmentController::class, 'create'])
            ->name('createApt');

    Route::get('expert/apt/list', [AppointmentController::class, 'show'])
            ->name('aptList');

    // Route::get('expert/apt/detail/{expertId}', [AppointmentController::class, 'detail'])
    //         ->name('aptDetail');

    // Route::get('expert/apt/take/{aptId}', [AppointmentController::class, 'takeApt'])
    //         ->name('takeApt'); // aptStatus change for the admin to check

    // Route::post('expert/apt/complete', [AppointmentController::class, 'aptPaymentComplete'])
    // ->name('aptPaymentComplete');

    Route::get('expert/profile', [TutorController::class, 'profile'])->name('expertProfile');

    // expertProfileUpdate
    Route::post('expert/profile/update', [TutorController::class, 'profileUpdate'])->name('expertProfileUpdate');

    // updateProfilePassword
    Route::post('expert/profile/passwordUpdate', [TutorController::class, 'updateProfilePassword'])->name('expertUpdateProfilePassword');
});



