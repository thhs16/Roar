<?php

use App\Http\Middleware\user;
use App\Http\Middleware\admin;
use App\Http\Middleware\expert;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => admin::class ,
            'user' => user::class,
            'expert' => expert::class,
            // 'web' => [
            //     \App\Http\Middleware\CategoryMiddleware::class,
            // ]
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
