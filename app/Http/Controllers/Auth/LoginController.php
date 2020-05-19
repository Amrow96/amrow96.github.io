<?php

namespace App\Http\Controllers\Auth;

use App\Models\Usuario;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    public function showLogin(){
        return view('auth.login');
    }
    public function login(Request $request){

        $email = $request->input('email');
        $paswd = $request->input('paswd');
        $user = Usuario::where('email',$email)->first();
        if($user != null && Hash::check($paswd,$user->paswd)){
            Auth::login($user);
            return redirect('/selector');

        }else{
            return redirect('login')->withInput();
        }
    }
     public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
