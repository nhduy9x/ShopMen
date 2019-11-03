<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ClassRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use Auth;
use App\Mail\MailRegister;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getRegister(){
        return view('auth.register');
    }
    public function register(ClassRegisterRequest $request){
        $user=new User();
        if ($request->hasFile('image')>0) {
            // lay ra duoi anhs
            $ext = $request->image->extension();

            // lay ten anh go
            $filename = $request->image->getClientOriginalName();

            // sinh ra ten anh moi theo dang slug
            $filename = str::slug(str_replace("." . $ext, "", $filename));
            
            // ten anh + string random + duoi
            $filename = $filename . "-" . str::random(20) . "." . $ext;
            // dd($filename);
            $file=$request->file('image');
            $user->avatar =$file->move("img/uploads/users",$filename);
        }

        if($request->pass!=$request->cfpassword){
          return redirect(route('register'))->with('password', 'comfirm password ko đúng!');
            // echo "pdfs";
        }
        $checkUser=User::Where('email',$request->email)->first();
        if (isset($checkUser)) {
            return redirect(route('register'))->with('email', 'email da ton tai!');

        }
        $user->birthday=date("Y-m-d",strtotime($request->date));
        $user->code=str::random(6);
        $user->password=Hash::make($request->passwords);
        $user->fill($request->all());
        $user->save();
        // dd($user);
        $data=[
            'name'=>$user->name,
            'email'=>$user->email,
            'code'=>$user->code,
            'hrel'=>route('verify',$user->id)
        ];
        

        $a='Xác nhận tài khoản!';

        Mail::to($user->email)->send(new MailRegister($data,$a));
        
        return redirect(route('verify',$user->email));
                  
        
    }
    public function verify($id=null){
        $user=User::Where('email',$id)->first();
        return view('auth.verify',compact('user'));
    }
    public function postverify(Request $request,$id=null){
        $user=User::Where('email',$id)->first();
        // dd($user);
        if($request->code!=$user->code){
          return redirect(route('verify',$user->email))->with('loi', 'nhap ma xac nhan khong dung!');
            // echo "pdfs";
        }
        $user->email_verified_at=date('Y-m-d H:i:s');
        $user->save();
        return redirect(route('success',$user->email));
    }
    public function success($id){
        $user=User::Where('email',$id)->first();
        return view('auth.success',compact('user'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
