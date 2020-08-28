<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    //protected $redirectTo = RouteServiceProvider::HOME;

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }


        if($this->guard()->validate($this->credentials($request))) {
            if(Auth::attempt([ 'mobile_number' => $request->mobile_number,  'password' => $request->password, 'active' => 'Y']))
            {
                return redirect()->route('home');

            }  else {
                $this->incrementLoginAttempts($request);
                return redirect()->back()->with('msg', 'This account is not activated.');
                //return response()->json(['error' => 'This account is not activated.'], 401);
            }
        } else {
            // dd('ok');
            $this->incrementLoginAttempts($request);
            //return response()->json([ 'error' => 'Credentials do not match our database.' ], 401);
            return redirect()->back()->with('error', 'Access Denied ! Invalid Mobile Number or Password.');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
