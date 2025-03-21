<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Middleware\expert;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class expert
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if(!empty( Auth::user() )){

            if( Auth::user()->role == 'expert' ){

                if($request->route()->getName() == 'Login' || $request->route()->getName() =='Register'){
                    abort(404);
                };

                return $next($request);
            }

            return back();
        }

        return $next($request);
    }
}
