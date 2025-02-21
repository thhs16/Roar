<?php

namespace App\Providers;

use App\Models\Category;
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
        Route::middleware('web') // Apply the web middleware group
        ->group(base_path('routes/adminRoute.php')); // Load admin.php routes

        // Only pass data to views inside 'layouts' folder
        View::composer('user.*', function ($view) {
            $view->with('category', Category::all());
        });
        }
}
