<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect(); /* redirect function which is responsible for redirecting the user to the Google Signup page. */
    }

    //handle the callback URL of Google authentication
    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user(); /* Attempt to retrieve the Google user using the Socialite package. */
            $user = User::where('google_id', $google_user->getId())->first(); /* Look for an existing user in the database with the same Google ID. */

            /* Check if the user was not found. */
            if (!$user) {

                /* If not found, create a new user with the information from Google. */
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);

                /* Log in the newly created user. */
                Auth::login($new_user);

                /* Redirect the user to the home page */
                return redirect()->intended('home');
            } else {
                /* If the user was found, log in the existing user.*/
                Auth::login($user);

                /* Redirect the user to the home page */
                return redirect()->intended('home');
            }
        } catch (\Throwable $th) {
            // throw $th;
        }
    }
}
