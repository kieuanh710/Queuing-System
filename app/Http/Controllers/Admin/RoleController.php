<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LogActivity;

class RoleController extends Controller
{
    private $roles;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->roles = new Role();
    }
    //Danh sách thiết bị
    public function index(Request $request){
        $title = 'Quản lý vai trò';

        $roleList = $this->roles->getAllRole( self::_PER_PAGE);
        $countList = $this->roles->count();
        return view('manage.system.role.main', compact('title', 'roleList', 'countList'));
    }

    public function add(){
        $title = 'Thêm vai trò';
        return view('manage.system.role.addRole', compact('title'));
    }
    public function postAdd(Request $request){
        $request->validate(
            [
                'nameRole' => 'required',
                'desRole' => 'required',
            ],
            [
                'nameRole.required' =>  'Nhập tên vai trò',
                'desRole.required' => 'Nhập mô tả vai trò',
            ]);
        // $this->roleservice->create($request);
        $dataInsert = [
            'nameRole' =>  $request->nameRole,
            'desRole' => $request->desRole,
            'created_at'=>date('Y-m-dH:i:s'),
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

    public function show(){
        $this->roles->count();
        return view('manage.system.role.main', compact('title'));
    }

}