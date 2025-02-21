<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('authentication_roar.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();


        if(auth()->user()->role == 'superAdmin' | auth()->user()->role == 'admin'){
            // return redirect()->intended(route('adminDashboard', absolute: false));
            return to_route('adminDashboard');

        }

        if(auth()->user()->role == 'expert'){

            // return redirect()->intended(route('expertDashboard', absolute: false));
            return to_route('expertDashboard');
        }

        if(auth()->user()->role == 'user'){
            // return redirect()->intended(route('dashboard', absolute: false));
            return to_route('dashboard');
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
