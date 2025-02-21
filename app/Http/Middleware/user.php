<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Middleware\user;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty( Auth::user() )){

            if( Auth::user()->role == 'user' ){

                if($request->route()->getName() == 'login' || $request->route()->getName() =='register'){
                    abort(404);
                };
                return $next($request);
            }

            return back();
            // abort(404);
        }

        return $next($request);
    }
}
