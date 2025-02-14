<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ServiceController;


    Route::get('admin/dashboard', [adminController::class, 'adminDashboard'])
            ->name('adminDashboard');

    Route::get('admin/service/create', [adminController::class, 'createService'])
            ->name('createService');

    Route::post('admin/service/create', [adminController::class, 'createServiceDB'])
            ->name('createServiceDB');

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



