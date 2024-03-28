<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            Log::info('Google user info', ['user' => $user]);
        } catch (\Exception $e) {
            Log::error('Error during Google authentication: ' . $e->getMessage());
            return redirect()->route('login')->withErrors('Authentication failed');
        }

        $data = User::where('email', $user->email)->first();

        if (!$data) {
            $data = User::create([
                'name' => $user->name,
                'email' => $user->email,
            ]);
        }

        if (!Auth::check()) {
            Auth::login($data, true);
            Log::info('User logged in with Google', ['email' => $user->email]);
        }

        return redirect('home');
    }
}
