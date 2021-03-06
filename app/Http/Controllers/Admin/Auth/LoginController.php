<?php
// Adminを追加
namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// 追加
use Illuminate\Http\Request;

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
    
    //  ログイン後のリダイレクト先
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     
   
    // 追記
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
 
    protected function guard()
    {
        return \Auth::guard('admin');
    }
  
     public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    
    public function logout(Request $request)
    {
        $this->guard()->logout();
        
        $request->session()->invalidate();
        
        return $this->loggedOut($request) ?: redirect('/admin/login');
    }
    
    
}
