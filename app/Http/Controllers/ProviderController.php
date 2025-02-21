<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    // redirect Socialite
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    // callback Socialite
    public function callback($provider){
        $socialiteUser = Socialite::driver($provider)->user();

        // if providerName and ID are not the same it will create data. Otherwise, it will update.
        $user = User::updateOrCreate([
            'provider_type' => $provider,
            'provider_id' => $socialiteUser -> id,
        ],

        [
            'name' => $socialiteUser->name ,
            'nickname' => $socialiteUser ->nickname,
            'email' => $socialiteUser -> email,
            'provider_token' => $socialiteUser -> token,
        ]);

        Auth::login($user);

        return to_route('dashboard');

    }
}
