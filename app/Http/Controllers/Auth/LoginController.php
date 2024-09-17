<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; 
use App\Models\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        //dd($request);
    $this->validate($request, [
        'userName' => 'required|string|max:255',
        'password' => 'required|string',
        
    ]);
    // Attempt to login the user
    if (auth()->attempt(['userName' => $request->userName,
        'password' => $request->password]) && auth()->user()->active === 1) {

        // Store user information in session for easy access in other views
        session()->put('loggedUser', auth()->user());

        // Redirect to the intended page or the home dashboard
        return redirect()->intended('/home');
    }

    return back()->withErrors(['login_failed' => 'Invalid username or password']);
}
}



