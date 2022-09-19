<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\CreateFormRequest;
use Illuminate\Support\Facades\Session;
use App\Models\Account;
use Illuminate\Support\Facades\DB;


class AccountController extends Controller
{
    private $accounts;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->accounts = new Account();
    }
    //Danh sách thiết bị
    public function index(Request $request){
        $title = 'Danh sách tài khoản';
        $data['nameRole'] = DB::table('accounts')->get();
        //dd($data);
        $filters = [];
        $keyword = null;

        // Check click active
        if(!empty($request->active)){
            $active = $request->active;
            if($active=='active'){
                $active = 1;
            } else{
                $active = 0;
            }
            $filters[] = ['accounts.active', '=', $active];
        }

        //Search
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
        }

        $accountList = $this->accounts->getAllAccount();
        return view('manage.system.account.main', compact('title', 'accountList', 'data'));
        // return view('manage.system.account.main', 'title', 'accountList', $data);
    }
    public function add(){
        $title = 'Thêm tài khoản';
        return view('manage.system.account.addAccount', compact('title'));
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
                'nameRole' => 'required',
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
                'nameRole.required' => 'Nhập vai trò tài khoản',
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
            'nameRole' => $request->nameRole,
            'active' => $request->active,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ];
        // dd($dataInsert);
        $this->accounts->addAccount($dataInsert);
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
        return view('manage.system.account.updateAccount', compact('title', 'accountDetail'));
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
                'nameRole' => 'required',
                'active' => 'required',
            ],
            [
                'name.required' => 'Nhập họ tên',
                'phone.required' => 'Nhập số điện thoại',
                'email.required' => 'Nhập email',
                'username.required' => 'Nhập tên người dùng',
                'password.required' => 'Password ít nhất 6 kí tự',
                'repassword.required' => 'Password chưa đúng',
                'nameRole.required' => 'Nhập vai trò tài khoản',
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
            $request -> nameRole,
            $request -> active,
            date('Y-m-d H:i:s')
        ];
        //dd(session('id'));
        $this->accounts->updateaccount($dataUpdate, $id);
        return redirect()->route('account')->with('success', 'Cập nhật thiết bị thành công');
    }

}
