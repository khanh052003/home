<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Hash;
use Auth;
use  Illuminate\Http\Request;
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

    public function apilogin(Request $request){
        $email = $request->input('email');
        $pass = $request->input('password');
    
        $check = User::where('email', $email)->get();
        if(count($check) > 0){
        $user = User::where('email', $email)->first();
        $hashpass = Hash::make($pass);
 
        if (Hash::check($pass, $user->password)) {
           //Atenticate user
            Auth::login($user);
            return ['status'=> 'success', 'message'=>'Successful','typeuser'=>$user->typeuser];
        }
        else
        {
            return ['status'=> 'error', 'message'=>'Sai mật khẩu đăng nhập'];
            //Invalid Password
        }
    }
        else{
            return ['status'=> 'error', 'message'=>'Sai tài khoản đăng nhập'];
        }
        }
}
