<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\ClassRegisterRequest;
use App\Mail\MailRestPassword;
use Illuminate\Support\Facades\Hash;

use Mail;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }
    public function findpass(){
        return view('auth.FindPassword');
    }
    public function postfindpass(Request $requests){
        $user=User::Where('email',$requests->email)->first();
        if (empty($user)) {
            return redirect(route('findpass'))->withErrors([
            'error' => 'Email không Ton tai!'
        ]);
           
        }

        $user->code=str::random(6);
        $user->save();
        $data=[
            'code'=>$user->code,
            'email'=>$user->email,
            'hrel'=>route('rest.pass',$user->email),
        ];
        $subject='Xác nhận tài khoản!';
        // Mail::send(['html'=>'auth.password.email'], $data, function ($m) use ($user) {
        //     $m->from('support@app.com', 'D-admin');

        //     $m->to($user->email, $user->name)->subject('Xác nhận tài khoản!');
        // });
        Mail::to($user->email)->send(new MailRestPassword($data,$subject));
        return redirect(route('rest.pass',$user->email));
    }
    public function rest($id){
        $user=User::Where('email',$id)->first();
        return view('auth.password.rest',compact('user'));
    }
    public function postRest(Request $req,$id){
       $user=User::Where('email',$id)->first();
       if($req->code!=$user->code){
          return redirect(route('rest.pass',$user->email))->with('loi', 'nhap ma xac nhan khong dung!');
            
        }
        if($req->password!=$req->cfpassword){
          return redirect(route('rest.pass',$user->email))->with('loi', 'nhập lại mật khẩu ko đúng!');
            
        }
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect(route('pass.success',$user->email));
    }
    public function PassSuccess($id){
        $user=User::Where('email',$id)->first();
        return view('auth.password.success',compact('user'));
    }
}
