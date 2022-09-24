<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LogActivity;

class AccountController extends Controller
{
    private $accounts;
    private $roles;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->accounts = new Account();
        $this->roles = new Role();

    }
    //Danh sách thiết bị
    public function index(Request $request){
        $title = 'Danh sách tài khoản';

        // Check click active
        $filters = [];
        if(!empty($request->active)){
            $active = $request->active;
            if($active=='active'){
                $active = 1;
            } else{
                $active = 0;
            }
            $filters[] = ['accounts.active', '=', $active];
        }

        $accountList = $this->accounts->getAllAccount($filters, self::_PER_PAGE);
        $roleList = $this->roles->getAllRole();
        return view('manage.system.account.main', compact('title', 'roleList', 'accountList'));
    }
    public function add(){
        $title = 'Thêm tài khoản';
        $roleList = $this->roles->getAllRole();
        return view('manage.system.account.addAccount', compact('title', 'roleList'));
    }
    public function postAdd(Request $request){
        $request->validate(
            [
                'username' => 'required|unique:accounts',
                'name' => 'required',
                'phone' => 'required',
                'password' => 'required|min:6',
                'repassword' => 'required',
                'email' => 'required',
                'id_role' => 'required',
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
                'id_role.required' => 'Nhập vai trò tài khoản',
                'active.required' => 'Chọn trạng thái sử dụng',
            ]);
        // $this->accountService->create($request);
        $dataInsert = [
            'name' =>  $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'repassword' => $request->repassword,
            'id_role' => $request->id_role,
            'active' => $request->active,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ];
        // dd($dataInsert);
        $this->accounts->addAccount($dataInsert);
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
        $roleList = $this->roles->getAllRole();
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
                'id_role' => 'required',
                'active' => 'required',
            ],
            [
                'name.required' => 'Nhập họ tên',
                'phone.required' => 'Nhập số điện thoại',
                'email.required' => 'Nhập email',
                'username.required' => 'Nhập tên người dùng',
                'password.required' => 'Password ít nhất 6 kí tự',
                'repassword.required' => 'Password chưa đúng',
                'id_role.required' => 'Nhập vai trò tài khoản',
                'active.required' => 'Chọn trạng thái sử dụng',
            ]);
        $id = session('id');
        if(empty($id)){
            return back()->with('error', 'Liên kết không tồn tại');
        }
        $dataUpdate = [
            $request -> name,
            $request -> phone,
            $request -> email,
            $request -> username,
            $request -> password,
            $request -> repassword,
            $request -> id_role,
            $request -> active,
            date('Y-m-d H:i:s')
        ];
        //dd(session('id'));
        $this->accounts->updateaccount($dataUpdate, $id);
        LogActivity::addToLog('Cập nhật tài khoản', Auth::user()->username, now());
        return redirect()->route('account')->with('success', 'Cập nhật thiết bị thành công');
    }


    public function search(Request $request){
        $request->get('searchFilter');

        $accounts = $this->accounts
        ->join('role', 'accounts.id_role', 'role.id')
        ->join('active', 'accounts.active', 'active.id')
        ->select('accounts.*', 'role.nameRole', 'active.nameStatus')
        ->where('username', 'like', '%'.$request->get('searchFilter').'%')
        ->orwhere('name', 'like', '%'.$request->get('searchFilter').'%')   
        ->orwhere('phone', 'like', '%'.$request->get('searchFilter').'%')   
        ->orwhere('email', 'like', '%'.$request->get('searchFilter').'%')   
        ->orwhere('nameRole', 'like', '%'.$request->get('searchFilter').'%')   
        ->get();
        return json_encode($accounts);
    }
    public function select(Request $request){
        // $data = $request->get('selectValue');
        if($request->ajax()){
            $accounts = $this->accounts
            ->join('role', 'accounts.id_role', 'role.id')
            ->join('active', 'accounts.active', 'active.id')
            ->select('accounts.*', 'role.nameRole', 'active.nameStatus')
            ->where(['id_role'=> $request->selectValue])
            ->get();
    
            return response()->json(['accounts'=>$accounts]);

        }
        //$values = $this->accounts-get();
        // if($request->ajax()){
        // }
    }

}
