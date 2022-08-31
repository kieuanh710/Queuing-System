<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
class LoginController extends Controller
{
    public function __construct(){
        
    }
    public function index(){
        return view('admin.users.login',[
            // 'title' => 'Đăng nhập'
        ]);
    }
    public function forgotpassword(){
        return view('admin.users.forgotpassword');
    }
    public function password(Request $request){
        $request->validate([
            'email' => 'required|exists:users,email'
        ],[
            'email.required' => 'Email not format',
            'email.exists' => 'Email not exists',
        ]);
        $user = User::whereEmail($request->email)->first();
        // kiem tra ton tai trong DB
        if($user == null){
            return redirect()->back()->with(['error' => 'Email not exist']);
        }
        // $user = Sentinel::findById($user->id);
        // // check reminder exist
        // $reminder = Reminder::exist($user) ? : Reminder::create($user);
        // $this->sendEmail($user, $reminder->code);
        // Mail::send(
        //     'forgotpassword',
        //     ['user' => $user],
        //     function($message) use ($user){
        //         $message->to($user->email);
        //         $message->subject("$user->name, reset your password");
        //     }
        // );

    }

    public function dashboard(Request $request){
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')]))
        {
            return redirect()->route('admin');
        }
        return redirect()->route('login')->with('error','Sai mật khẩu hoặc tên đăng nhập');
        // $request->session()->flash('error', 'Sai mật khẩu hoặc tên đăng nhập');
        // return redirect()->back();
    }
}
