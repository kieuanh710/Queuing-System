<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Image;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use App\Helpers\LogActivity;

class AccountController extends Controller
{
    private $accounts;
    private $roles;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->accounts = new User();
        $this->roles = new Role();

    }
    //Danh sách thiết bị
    public function index(Request $request){
        $title = 'Danh sách tài khoản';

        // Check click active
        $accountList = $this->accounts->getAllUser(self::_PER_PAGE);
        // dd($accountList);
        $roleList = $this->roles->getAllRole(self::_PER_PAGE);
        return view('manage.system.account.main', compact('title', 'roleList', 'accountList'));
    }
    public function add(){
        $title = 'Thêm tài khoản';
        $roleList = $this->roles->getAllRole(self::_PER_PAGE);
        // dd($roleList);
        return view('manage.system.account.addAccount', compact('title', 'roleList'));
    }
    public function postAdd(Request $request){
        $request->validate(
            [
                'username' => 'required|unique:users',
                'name' => 'required',
                'phone' => 'required',
                'password' => 'required|min:6',
                'repassword' => 'required',
                'email' => 'required',
                'role' => 'required',
                'active' => 'required',
            ],
            [
                'name.required' => 'Nhập họ tên',
                'phone.required' => 'Nhập số điện thoại',
                'email.required' => 'Nhập email',
                'username.required' => 'Nhập tên người dùng',
                'username.unique' => 'Tên người dùng đã tồn tại vui lòng nhập tên khác',
                'password.required' => 'Password ít nhất 6 kí tự',
                'repassword.required' => 'Password chưa đúng',
                'role.required' => 'Nhập vai trò tài khoản',
                'active.required' => 'Chọn trạng thái sử dụng',
            ]);
        // $this->accountService->create($request);
        if($request->password == $request->repassword){
            DB::table('users')->where('username', $request->username)->insert([

                'name' =>  $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'repassword' => Hash::make($request->password),
                'role' => $request->role,
                'active' => $request->active,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);
        }
        else {
            return back()->with('error', 'Mật khẩu nhập lại chưa chính xác');
        }
        LogActivity::addToLog('Thêm tài khoản', Auth::user()->username, now());
        return redirect()->route('account')->with('success', 'Thêm tài khoản thành công');
    }
    public function update(Request $request, $id){
        $title = 'Cập nhật tài khoản';
        if (!empty($id)){
            $accountDetail = $this->accounts->getDetail($id);
            if(!empty($accountDetail[0])){
                $request->session()->put('id', $id);
                $accountDetail = $accountDetail[0];
            }
            else{
                return redirect()->route('account')->with('success', 'Liên kết không tồn tại');
            }
        } 
        else {
            return redirect()->route('account')->with('success', 'Liên kết không tồn tại');
        }
        $roleList = $this->roles->getAllRole(self::_PER_PAGE);
        // dd($roleList);
        return view('manage.system.account.updateAccount', compact('title', 'accountDetail', 'roleList'));
    }
    public function postUpdate(Request $request){
        $request->validate(
            [
                'username' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'password' => 'required|min:6',
                'repassword' => 'required',
                'email' => 'required',
                'role' => 'required',
                'active' => 'required',
            ],
            [
                'name.required' => 'Nhập họ tên',
                'phone.required' => 'Nhập số điện thoại',
                'email.required' => 'Nhập email',
                'username.required' => 'Nhập tên người dùng',
                'password.required' => 'Password ít nhất 6 kí tự',
                'repassword.required' => 'Password chưa đúng',
                'role.required' => 'Nhập vai trò tài khoản',
                'active.required' => 'Chọn trạng thái sử dụng',
            ]);
        $id = session('id');
        if(empty($id)){
            return back()->with('error', 'Liên kết không tồn tại');
        }

        if($request->password == $request->repassword){
            DB::table('users')->where('username', $request->username)->update([
                'name' =>  $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'repassword' => Hash::make($request->password),
                'role' => $request->role,
                'active' => $request->active,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);
        }
        else {
            return back()->with('error', 'Mật khẩu nhập lại chưa chính xác');
        }
        LogActivity::addToLog('Cập nhật tài khoản', Auth::user()->username, now());
        return redirect()->route('account')->with('success', 'Cập nhật tài khoản thành công');
    }

    public function getUsers(Request $request){
        $search = $request->search;
        $role = $request->role;

        if($request->ajax()){
            // search
            if(!empty($search)) {
                $request->get('search');
                $accounts = $this->accounts
                ->where('email', 'like', '%'.$request->get('search').'%')
                ->orwhere('name', 'like', '%'.$request->get('search').'%')   
                ->orwhere('phone', 'like', '%'.$request->get('search').'%')   
                ->get();
            }
            // filter
            if($role == 0 ){
                $request->get('search');
                $accounts = $this->accounts
                ->where('email', 'like', '%'.$request->get('search').'%')
                ->orwhere('name', 'like', '%'.$request->get('search').'%')   
                ->orwhere('phone', 'like', '%'.$request->get('search').'%')   
                ->get();
            } 
        
            else{
                $accounts = $this->accounts
                ->where('role', $request->role) 
                ->where('email', 'like', '%'.$request->get('search').'%')  
                ->get();
            }
            return json_encode($accounts);
        }
    }

    // info
    public function info(){
        $title = "Tài khoản cá nhân";
        $accountList = $this->accounts->getAllUser(self::_PER_PAGE);
        $roleList = $this->roles->select('roles.nameRole')->get();
       
        // dd($roleList);
        return view('admin.users.info', compact('title', 'accountList', 'roleList'), array('user' => Auth::user()));
    }

    // upload avata
    public function upload(Request $request){
        if($request->hasFile('avatar')){
            $filename = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('images',$filename,'public');
            Auth()->user()->update(['avatar'=>$filename]);
        }
        return redirect()->back();
    }

}
