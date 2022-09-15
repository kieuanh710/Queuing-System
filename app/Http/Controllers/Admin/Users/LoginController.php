<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return redirect()->back()->with('success', trans('A reset link has been sent to your email address.'));
        } 
        else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
        
        return redirect()->back()->with('message', 'We have e-mailed your password reset link!');
    }
    private function sendResetEmail($email, $token){
        //Retrieve the user from the database
        $user = DB::table('users')->where('email', $email)->select('email')->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($user->email);

            try {
            //Here send the link with CURL with an external email API 
                return true;
            } catch (\Exception $e) {
                return false;
            }
    }
    public function resetPassword(Request $request){
        //Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
            'token' => 'required' 
        ]);

        //check if payload is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }

        $password = $request->password;
    // Validate the token
        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->first();
    // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('auth.passwords.email');

        $user = User::where('email', $tokenData->email)->first();
    // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
    //Hash and update the new password
        $user->password = Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();

        //Send Email Reset Success Email
        if ($this->sendSuccessEmail($tokenData->email)) {
            return view('index');
        } else {
            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        }

}

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
