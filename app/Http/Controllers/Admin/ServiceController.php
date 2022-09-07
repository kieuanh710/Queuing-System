<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\CreateFormRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Session;
class ServiceController extends Controller
{
    private $services;

    const _PER_PAGE = 4; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->services = new Service();
    }
    //Danh sách thiết bị
    public function index(){
        $title = 'Quản lý dịch vụ';
        $serviceList = $this->services->getAllDevice();
        return view('manage.service.main', compact('title','serviceList'));
    }
    // Thêm thiết bị
    public function add(){
        $title = 'Thêm thiết bị';
        return view('manage.device.addDevice', compact('title'));
    }

    public function postAdd(CreateFormRequest $request){
        // $this->deviceService->create($request);
        $dataInsert = [
            'idDevice' =>  $request->idDevice,
            'nameDevice' => $request->nameDevice,
            'ip_address' => $request->ip_address,
            'typeDevice' => $request->typeDevice,
            'username' => $request->username,
            'password' => $request->password,
            'service' => $request->service,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ];
        // dd($dataInsert);
        $this->devices->addDevice($dataInsert);
        return redirect()->route('device')->with('success', 'Thêm thiết bị thành công');
    }

    // Cập nhật thông tin thiết bị
    public function update(Request $request, $id){
        $title = 'Cập nhật thiết bị';
        // Lưu id vào session

        if (!empty($id)){
            $deviceDetail = $this->devices->getDetail($id);
            if(!empty($deviceDetail[0])){
                $request->session()->put('id', $id);
                $deviceDetail = $deviceDetail[0];
            }
            else{
                return redirect()->route('device')->with('success', 'Liên kết không tồn tại');
            }
        } 
        else {
            return redirect()->route('device')->with('success', 'Liên kết không tồn tại');
        }
        return view('manage.device.updateDevice',compact('title', 'deviceDetail'));
    }
    public function postUpdate(CreateFormRequest $request){
        $id = session('id');
        if(empty($id)){
            return back()->with('error', 'Liên kết không tồn tại');
        }
        $dataUpdate = [
            $request -> idDevice,
            $request -> nameDevice,
            $request -> ip_address,
            $request -> typeDevice,
            $request -> username,
            $request -> password,
            $request -> service,
            date('Y-m-d H:i:s')
        ];
        //dd(session('id'));
        $this->devices->updateDevice($dataUpdate, $id);
        return redirect()->route('device')->with('success', 'Cập nhật thiết bị thành công');
    }

    // Thông tin chi tiết
    public function detail(){
        return view('manage.device.detailDevice',[
            'title' => 'Chi tiết thiết bị'
        ]);
    }
}
