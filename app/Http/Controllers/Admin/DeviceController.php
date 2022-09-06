<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\CreateFormRequest;
use App\Http\Services\Manage\DeviceService;
use App\Models\Device;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    private $devices;
    protected $deviceService;
    public function __construct(){
        $this->devices = new Device();
    }
    //Danh sách thiết bị
    public function index(){
        $title = 'Danh sách thiết bị';
        $deviceList = $this->devices->getAllDevice();
        return view('manage.device.main', compact('title', 'deviceList'));
    }
    // Thêm thiết bị
    public function add(){
        $title = 'Thêm thiết bị';
        return view('manage.device.addDevice', compact('title'));
    }

    public function postAdd(CreateFormRequest $request){
        // $this->deviceService->create($request);
        $dataInsert = [
            $request -> idDevice,
            $request -> nameDevice,
            $request -> ip_address,
            $request -> typeDevice,
            $request -> username,
            $request -> password,
            $request -> service,
            date('Y-m-d H:i:s')
        ];
        // dd($dataInsert);
        $this->devices->addDevice($dataInsert);
        return redirect()->route('device')->with('success', 'Thêm thiết bị thành công');
    }

    // Cập nhật thông tin thiết bị
    public function update($id){
        $title = 'Cập nhật thiết bị';
        if (!empty($id)){
            $deviceDetail = $this->devices->getDetail($id);
            if(!empty($deviceDetail[0])){
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
    public function postUpdate(CreateFormRequest $request, $id){
        $dataUpdate = [
            $request -> idDevice,
            $request -> nameDevice,
            $request -> ip_address,
            $request -> typeDevice,
            $request -> username,
            $request -> password,
            $request -> service
        ];
        // dd($dataUpdate);
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
