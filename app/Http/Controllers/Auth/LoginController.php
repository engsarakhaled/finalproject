<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; 
use App\Models\User;
use Illuminate\Support\Facades\Session;

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
    if (auth()->attempt(['userName' => $request->userName, 'password' => $request->password])) {
        if (auth()->user()->active === 1) {
            session()->put('loggedUser', auth()->user());
            return redirect()->intended('/home');
        } else {
            auth()->logout(); // Log out if not active
            return redirect()->back()->withErrors(['error' => 'Your account is not active.']);
        }
    } else {
        return redirect()->back()->withErrors(['error' => 'Invalid username or password.']);
    }
}
}