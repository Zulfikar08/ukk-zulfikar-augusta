<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->getId())->first();
            if ($findUser) {
                Auth::login($findUser);
                return redirect('masyarakat/dashboard');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'email_verified_at' => Carbon::now(),
                    'google_id' => $user->id,
                    'password' => bcrypt('1234567'),
                ]);
                    $newUser->assignRole('masyarakat');
                    Auth::login($newUser);
                    return redirect('masyarakat/dashboard');
            }
        } catch (\Throwable $th) {

        }
    }
}
