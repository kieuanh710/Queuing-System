<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',[
            'title' => 'Đăng nhập'
        ]);
    }
    public function dashboard(Request $request){
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')]))
        {
            return redirect()->route('admin');
        }
        $request->session()->flash('error', 'Sai mật khẩu hoặc tên đăng nhập');
        return redirect()->back();
    }
    public function forgotpassword(){
        return view('forgotpassword');
    }
    public function newpassword(){
        return view('newpassword');
    }
}
