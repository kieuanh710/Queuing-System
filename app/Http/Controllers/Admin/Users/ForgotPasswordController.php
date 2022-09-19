<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    public function forgotpassword(){
        $title = 'Quên mật khẩu';
        return view('admin.users.forgotpassword', compact('title'));
    }

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
        
        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return redirect()->back()->with('success', trans(
                'Chúng tôi đã gửi e-mail liên kết đặt lại mật khẩu của bạn!'));
        } 
        else {
            return redirect()->back()->withErrors(['error' => trans('Xảy ra lỗi. Vui lòng nhập lại.')]);
        }
    }

    public function sendResetEmail( $token){
        $title = 'Đặt lại mật khẩu';
        return view('admin.users.resetpassword', ['token' => $token], compact('title'));
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            // 'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                            'email' => $request->email, 
                            'token' => $request->token
                            ])->get();
        
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
        
        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }

            
        // public function resetPassword(Request $request){
        //     //Validate input
        //     $validator = Validator::make($request->all(), [
        //         'password' => 'required|string|min:6|confirmed',
        //         'password-confirm' => 'required'
        //        ]);

        //     //check if payload is valid before moving on
        //     if ($validator->fails()) {
        //         return redirect()->back()->withErrors(['password' => 'Please complete the form']);
        //     }

        //     $password = $request->password;
        // // Validate the token
        //     $tokenData = DB::table('password_resets')
        //     ->where('token', $request->token)->first();
        // // Redirect the user back to the password reset request form if the token is invalid
        //     if (!$tokenData) return view('auth.passwords.email');

        //     $user = User::where('email', $tokenData->email)->first();
        // // Redirect the user back if the email is invalid
        //     if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
        // //Hash and update the new password
        //     $user->password = Hash::make($password);
        //     $user->update(); //or $user->save();

        //     //login the user immediately they change password successfully
        //     Auth::login($user);

        //     //Delete the token
        //     DB::table('password_resets')->where('email', $user->email)
        //     ->delete();

        //     //Send Email Reset Success Email
        //     if ($this->sendSuccessEmail($tokenData->email)) {
        //         return view('index');
        //     } else {
        //         return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        //     }

        // }
        
}
