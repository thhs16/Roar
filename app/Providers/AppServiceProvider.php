<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::middleware('web')->group(function () {
            require base_path('routes/adminRoute.php');
            require base_path('routes/userRoute.php');
            require base_path('routes/expertRoute.php');
        });

        // Only pass data to views inside 'layouts' folder
        View::composer('user.*', function ($view) {
            $view->with('category', Category::all());
        });


        Paginator::useBootstrap();
    }
}
