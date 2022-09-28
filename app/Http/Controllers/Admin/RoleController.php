<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\LogActivity;

class RoleController extends Controller
{
    private $roles, $accounts;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->roles = new Role();
        $this->accounts = new User();
    }
    //Danh sách thiết bị
    public function index(Request $request){
        $title = 'Quản lý vai trò';
        $roleList = $this->roles->getAllRole(self::_PER_PAGE);
        $accountList = $this->accounts->getAllUser(self::_PER_PAGE);
        return view('manage.system.role.main', compact('title', 'roleList', 'accountList'));
    }

    public function add(){
        $title = 'Thêm vai trò';
        return view('manage.system.role.addRole', compact('title'));
    }
    public function postAdd(Request $request){
        // dd($request->all());
        $request->validate(
            [
                'nameRole' => 'required',
                'desRole' => 'required',
                'function' => 'required',
            ],
            [
                'nameRole.required' =>  'Nhập tên vai trò',
                'desRole.required' => 'Nhập mô tả vai trò',
                'function.required' => 'Lựa chọn vai trò',
            ]);
        // $this->roleservice->create($request);
        $dataInsert = [
            'nameRole' =>  $request->nameRole,
            'desRole' => $request->desRole,
            'function' => implode(',', $request->function),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ];
        // dd($dataInsert);
        $this->roles->addRole($dataInsert);
        LogActivity::addToLog('Thêm vai trò', Auth::user()->username, now());

        return redirect()->route('role')->with('success', 'Thêm thiết bị thành công');
    }

    public function update(Request $request, $id){
        $title = 'Cập nhật vai trò';
        if (!empty($id)){
            $roleDetail = $this->roles->getDetail($id);
            if(!empty($roleDetail[0])){
                $request->session()->put('id', $id);
                $roleDetail = $roleDetail[0];
            }
            else{
                return redirect()->route('role')->with('success', 'Liên kết không tồn tại');
            }
        } 
        else {
            return redirect()->route('role')->with('success', 'Liên kết không tồn tại');
        }
        return view('manage.system.role.updateRole', compact('title', 'roleDetail'));
    }
    public function postUpdate(Request $request){
        $request->validate(
            [
                'nameRole' => 'required',
                'desRole' => 'required',
            ],
            [
                'nameRole.required' =>  'Nhập tên vai trò',
                'desRole.required' => 'Nhập mô tả vai trò',
            ]);
        $id = session('id');
        if(empty($id)){
            return back()->with('error', 'Liên kết không tồn tại');
        }
       
        $dataUpdate = [
            $request -> nameRole,
            $request -> desRole,
            date('Y-m-d H:i:s')
        ];
        //dd(session('id'));
        $this->roles->updateRole($dataUpdate, $id);
        LogActivity::addToLog('Cập nhật vai trò', Auth::user()->username, now());
        return redirect()->route('role')->with('success', 'Cập nhật vai trò thành công');
    }

    public function getUsers(Request $request){
        $search = $request->search;
    
        if($request->ajax()){
            if(!empty($search)) {
                $request->get('search');
                $roles = $this->roles
                ->where('nameRole', 'like', '%'.$request->get('search').'%')   
                ->orwhere('desRole', 'like', '%'.$request->get('search').'%')   
                ->get();
            }
            return json_encode($roles);
        }
    }

}
