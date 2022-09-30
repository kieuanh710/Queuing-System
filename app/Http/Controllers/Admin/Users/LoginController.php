<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    private $users, $roles;
    const _PER_PAGE = 4; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->users = new User();
        $this->roles = new Role();
    }
    public function index(){
        $title = 'Đăng nhập';
        $roleList = $this->roles->getAllRole();
        return view('admin.users.login',compact('title', 'roleList'));
    }

    //Kiểm tra chuyển hướng
    public function dashboard(Request $request){
        if(Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            // 'level' => 1,
            // dd($request->input())
            ])) 
        {
            return redirect()->route('admin');
        }
        return redirect()->route('fail')->with('error','Sai mật khẩu hoặc tên đăng nhập');
    }
    public function fail(Request $request){
        $title = 'Sai mật khẩu';
        return view('admin.users.failpw',compact('title'));
    }

    public function forgotpassword(){
        $title = 'Quên mật khẩu';
        return view('admin.users.forgotpassword', compact('title'));
    }

    //Check email forgot
    public function password(Request $request){
        $request->validate([
            'email' => 'required|exists:users,email'
        ],[
            'email.required' => 'Email not format',
            'email.exists' => 'Email không tồn tại, vui lòng nhập lại',
        ]);
        
        $user = User::whereEmail($request->email)->first();
        // kiem tra ton tai trong DB
        if($user == null){
            return redirect()->back()->with(['error' => 'Email không tồn tại, vui lòng nhập lại']);
        }
        
        // return back()->with('success', 'We have e-mailed your password reset link!');
        $token = Str::random(64);
        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token, 
            'created_at' => date('Y-m-d H:i:s')
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets') ->where('email', $request->email)->first();
        
        // Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });
        
        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return redirect()->back()->with('success', trans('A reset link has been sent to your email address.'));
        } 
        else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
        
        return redirect()->back()->with('message', 'We have e-mailed your password reset link!');
    
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
