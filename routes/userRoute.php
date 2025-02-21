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
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;

// User
Route::middleware(['user', 'auth', 'web'])->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    });


    Route::get('/dashboard', function () {

        $expert_count = Tutor::count();

        $student_count = Appointment::where('status', 'booked')->whereNotNull('user_id')->distinct()->count('user_id');

        $service_count = Service::count();

        // $service = Service::select('services.*', 'categories.name')
        //             ->leftJoin('categories', 'categories.id', 'services.category_id')
        //             ->get();

        $service = Service::select('services.*', 'categories.*')
                    ->leftJoin('categories', 'categories.id', 'services.category_id')
                    ->take(3)
                    ->get();


        $expert = Tutor::select('tutors.*','users.image' )
        ->leftJoin('users', 'users.id', 'tutors.user_id')
        ->get();

        // dd($expert-toArray());

        $category = Category::get();

        $ratingComment = Rating::join('comments', function ($join) {
            $join->on('ratings.user_id', '=', 'comments.user_id')
                ->on('ratings.service_id', '=', 'comments.service_id');
        })
        ->join('users', 'ratings.user_id', '=', 'users.id')
        ->join('services', 'ratings.service_id', '=', 'services.id')
        ->select(
            'ratings.rating',
            'comments.comment',
            'users.name as user_name',
            'users.image as user_image',
            'services.title as service_title'
        )
        ->get();


        return view('user.home', compact('service', 'expert', 'category', 'ratingComment', 'expert_count', 'student_count', 'service_count') );

    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('service/detail/{serviceId}', [ServiceController::class, 'serviceUserDetail'])->name('serviceUserDetail');
    Route::post('service/ratingComment', [ServiceController::class, 'serviceUserRatingComment'])->name('serviceUserRatingComment');

    // userServices
    Route::get('/myServices', [UserController::class, 'userServices'])
    ->name('userServices');

    // serviceCategory
    Route::get('service/serviceCategory/{categoryId}', [ServiceController::class, 'serviceCategory'])->name('serviceCategory');

    // search searchService
    // Route::post('service/search', [ServiceController::class, 'searchService'])->name('searchService');

    //
    Route::get('profile', [UserController::class, 'profile'])->name('userProfile');

    // userProfileUpdate
    Route::post('profile/update', [UserController::class, 'profileUpdate'])->name('userProfileUpdate');

    // updateProfilePassword
    Route::post('profile/passwordUpdate', [UserController::class, 'updateProfilePassword'])->name('updateProfilePassword');

    // Apt
    Route::get('expert/apt/detail/{expertId}', [AppointmentController::class, 'detail'])
            ->name('aptDetail');

    Route::get('expert/apt/take/{aptId}', [AppointmentController::class, 'takeApt'])
            ->name('takeApt'); // aptStatus change for the admin to check

    Route::post('expert/apt/complete', [AppointmentController::class, 'aptPaymentComplete'])
    ->name('aptPaymentComplete');

    // allServicesPg
    Route::get('allServices', [ServiceController::class, 'allServicesPg'])
    ->name('allServicesPg');


});
