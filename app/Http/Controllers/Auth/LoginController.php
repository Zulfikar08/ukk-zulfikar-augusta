<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated(Request $request, $user)
    {
        if($user->deleted_at == null)
        {
            if ($user->hasrole('admin')) {
                return redirect()->route('admin/dashboard');
            }
            elseif ($user->hasrole('petugas')) {
                return redirect()->route('petugas/dashboard');
            }
            elseif ($user->hasrole('masyarakat')) {
                return redirect()->route('masyarakat/dashboard');
            } else {
                return false;
            }
        }
        else {
            return view('auth.user-blocked');
        }    
    }
}
