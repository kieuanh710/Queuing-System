<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Sentinel;
use Reminder;
use App\Models\User;
class ForgotPasswordController extends Controller
{
    public function forgotpassword(){
        return view('admin.users.forgotpassword');
    }
    public function password(Request $request){
        // dd($request->all());
        // lay thong tin nguoi dung = email
        $user = User::whereEmail($request->email)->first();

        // kiem tra ton tai trong DB
        if($user == null){
            return redirect()->back()->with(['error' => 'Email not exist']);
        }
        //su dung sentinel de lay thong tin day du
        $user = Sentinel::findById($user->id);
        // check reminder exist
        $reminder = Reminder::exist($user) ? : Reminder::create($user);
        $this->sendEmail($user, $reminder->code);

        return redirect()->back()-with(['success' => 'Reset code sent to your email']);
    }
    public function sendEmail($user, $code){
        Mail::send(
            'email.forgotpassword',
            ['user' => $user, 'code' => $code],
            function($message) use ($user){
                $message->to($user->email);
                $message->subject("$user->name, reset your password");
            }
        );
    }
}
