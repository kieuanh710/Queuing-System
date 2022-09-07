<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\CreateFormRequest;
use App\Http\Services\Manage\DeviceService;
use App\Models\Device;
use Illuminate\Support\Facades\Session;

class DeviceController extends Controller
{
    private $devices;
    protected $deviceService;
    public function __construct(){
        $this->devices = new Device();
    }
    //Danh sách thiết bị
    public function index(Request $request){
        $title = 'Danh sách thiết bị';

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
            $filters[] = ['devices.active', '=', $active];
        }
        // Check click connect
        if(!empty($request->connect)){
            $connect = $request->connect;
            if($connect=='connect'){
                $connect = 1;
            } else{
                $connect = 0;
            }
            $filters[] = ['devices.connect', '=', $connect];
        }
        //Search
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
            
            
        }
        //echo $keyword;
        // dd($filters);

        $deviceList = $this->devices->getAllDevice($filters, $keyword);
        //query builder
        // $this->devices->QueryBuilder();
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
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s')
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
        dd(session('id'));
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
