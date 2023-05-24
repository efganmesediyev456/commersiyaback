<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Atom\Admin;
use App\Models\Atom\User;
use App\Providers\RouteServiceProvider;
use App\Rules\ReCaptchaSuggest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $guard = 'admin';




    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }



    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }


    public function login(Request $request)
    {


//                auth('admin')->login(Admin::find(1));


        $this->validate($request,[
            'g-recaptcha-response' => ['required',new ReCaptchaSuggest('suggest')],
        ]);





        $this->validateLogin($request);




        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }



        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }



        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }



    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'), ['status' => 1]);
    }

    protected function authenticated(Request $request, $user)
    {

        return redirect()->route('dashboard');
    }
}
