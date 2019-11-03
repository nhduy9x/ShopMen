<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ClassLoginRequest;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }
    public function getlogin(){
        if (Auth::check()) {
            if (Auth::user()->email_verified_at == null) {
                return redirect(route('verify',Auth::user()->email));
            } else {
                return redirect('/');
            }
        }
   
        return view('auth.login');
    }
    public function postLogin(ClassLoginRequest $request){
          $rem = $request->remember == 1 ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password],$rem)){
            if (Auth::user()->email_verified_at == null) {
                return redirect(route('verify',Auth::user()->email));
            } else {
                return redirect('/');
            }
            
            
        }
        return redirect(route('login'))->withErrors([
            'error' => 'Email/mật khẩu không chính xác'
        ]);
       
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
   
}
