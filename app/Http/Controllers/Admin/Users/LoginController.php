<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class LoginController extends Controller
{
    private $users;
    const _PER_PAGE = 4; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->users = new User();
    }
    public function index(){
        $title = 'Đăng nhập';
        return view('admin.users.login',compact('title'));
    }

    //Kiểm tra chuyển hướng
    public function dashboard(Request $request){
        if(Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'level' => 1,
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
}
