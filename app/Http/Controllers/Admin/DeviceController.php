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
    const _PER_PAGE = 4; // số hàng dữ liệu trên 1 bảng
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

        //Handle sort by
        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');
        $allowSort = ['asc', 'desc'];

        if(!empty($sortType) && in_array($sortType, $allowSort)){
            if($sortType=='desc'){
                $sortType = 'asc';
            }else{
                $sortType = 'desc';
            }
        }else {
            $sortType = 'asc';
        }
        $sortArr = [
            'sortBy' => $sortBy,
            'sortType' => $sortType,
        ];

        $deviceList = $this->devices->getAllDevice($filters, $keyword, $sortArr, self::_PER_PAGE);
        
        //return view('manage.device.main', compact('title', 'deviceList'));
        return view('manage.device.main', compact('title', 'deviceList', 'sortType'));
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
    public function detail(Request $request){
        $title = 'Chi tiết thiết bị';
        $detail = Device::where('id', $request->id)->first();
        return view('manage.device.detailDevice', compact ('title', 'detail'));
    }
}
