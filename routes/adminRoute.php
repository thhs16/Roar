<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ServiceController;


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

    Route::get('admin/experts/create', [TutorController::class, 'index'])
            ->name('createExperts');



