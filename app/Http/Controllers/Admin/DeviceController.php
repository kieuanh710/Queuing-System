<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LogActivity;
class DeviceController extends Controller
{
    private $devices;
    protected $deviceService;
    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->devices = new Device();
    }
    //Danh sách thiết bị
    public function index(Request $request){
        $title = 'Quản lý thiết bị';

        // //Handle sort by
        // $sortBy = $request->input('sort-by');
        // $sortType = $request->input('sort-type');
        // $allowSort = ['asc', 'desc'];

        // if(!empty($sortType) && in_array($sortType, $allowSort)){
        //     if($sortType=='desc'){
        //         $sortType = 'asc';
        //     }else{
        //         $sortType = 'desc';
        //     }
        // }else {
        //     $sortType = 'asc';
        // }
        // $sortArr = [
        //     'sortBy' => $sortBy,
        //     'sortType' => $sortType,
        // ];

        // $deviceList = $this->devices->getAllDevice($filters, $keyword, $sortArr, self::_PER_PAGE);
        $deviceList = $this->devices->getAllDevice(self::_PER_PAGE);
        
        //return view('manage.device.main', compact('title', 'deviceList'));
        return view('manage.device.main', compact('title', 'deviceList'));
    }
    // Thêm thiết bị
    public function add(){
        $title = 'Thêm thiết bị';
        return view('manage.device.addDevice', compact('title'));
    }

    public function postAdd(Request $request){
        $request->validate(
            [
                'idDevice' => 'required|unique:devices',
                'nameDevice' => 'required',
                'typeDevice' => 'required',
                'ip_address' => 'required',
                'username' => 'required|unique:users',
                'password' => 'required|min:6',
                'service' => 'required',
            ],
            [
                'idDevice.required' =>  'Nhập mã thiết bị',
                'idDevice.unique' =>  'Mã thiết bị đã tồn tại',
                'nameDevice.required' => 'Nhập tên thiết bị',
                'ip_address.required' => 'Nhập địa chỉ thiết bị',
                'typeDevice.required' => 'Nhập loại thiết bị',
                'username.required' => 'Nhập tên người dùng',
                'username.unique' => 'Tên người dùng đã tồn tại vui lòng nhập tên khác',
                'password.required' => 'Password ít nhất 6 kí tự',
                'service.required' => 'Nhập dịch vụ sử dụng',
            ]);
        // $this->deviceService->create($request);
        $dataInsert = [
            'idDevice' =>  $request->idDevice,
            'nameDevice' => $request->nameDevice,
            'ip_address' => $request->ip_address,
            'typeDevice' => $request->typeDevice,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'service' => $request->service,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ];
        //dd($dataInsert);
        $this->devices->addDevice($dataInsert);
        LogActivity::addToLog('Thêm thiết bị', Auth::user()->username, now());

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
                // return $id;
                return redirect()->route('device')->with('success', 'Liên kết không tồn tại');
            }
        } 
        else {
            return redirect()->route('device')->with('success', 'Liên kết không tồn tại');
        }
        return view('manage.device.updateDevice',compact('title', 'deviceDetail'));
    }
    public function postUpdate(Request $request){
        $request->validate(
            [
                'idDevice' => 'required',
                'nameDevice' => 'required',
                'typeDevice' => 'required',
                'ip_address' => 'required',
                'username' => 'required',
                'password' => 'required|min:6',
                'service' => 'required',
            ],
            [
                'idDevice.required' =>  'Nhập mã thiết bị',
                'nameDevice.required' => 'Nhập tên thiết bị',
                'ip_address.required' => 'Nhập địa chỉ thiết bị',
                'typeDevice.required' => 'Nhập loại thiết bị',
                'username.required' => 'Nhập tên người dùng',
                'password.required' => 'Password ít nhất 6 kí tự',
                'service.required' => 'Nhập dịch vụ sử dụng',
            ]);
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
        // dd($dataUpdate);
        $this->devices->updateDevice($dataUpdate, $id);
        LogActivity::addToLog('Cập nhật thiết bị', Auth::user()->username, now());

        return redirect()->route('device')->with('success', 'Cập nhật thiết bị thành công');
    }

    // Thông tin chi tiết
    public function detail(Request $request){
        $title = 'Chi tiết thiết bị';
        $detail = Device::where('id', $request->id)->first();
        LogActivity::addToLog('Xem chi tiết thiết bị', Auth::user()->username, now());
        return view('manage.device.detailDevice', compact ('title', 'detail'));
    }

    public function getUsers(Request $request){
        $search = $request->search;
        $active = $request->active;
        $connect = $request->connect;
        
        if($request->ajax()){
            if(!empty($search)) {
                $request->get('search');
                $devices = $this->devices
                ->where('idDevice', 'like', '%'.$request->get('search').'%')
                ->orwhere('nameDevice', 'like', '%'.$request->get('search').'%')   
                ->orwhere('service', 'like', '%'.$request->get('search').'%')   
                ->get();
            }
            
            if($active == 0 && $connect == 0){
                $devices = $this->devices
                ->where('nameDevice', 'like', '%'.$request->get('search').'%')   
                ->orwhere('service', 'like', '%'.$request->get('search').'%')   
                ->get();
            } 
            elseif($active == 0 && $connect != 0){
                $devices = $this->devices
                ->where('connect', $connect) 
                ->where('service', 'like', '%'.$request->get('search').'%')   
                ->get();
            } 
            elseif($active != 0  && $connect == 0){
                $devices = $this->devices
                ->where('active', $request->active)
                ->where('service', 'like', '%'.$request->get('search').'%')   
                ->get();
            }
            else{
                $devices = $this->devices
                ->where('active', $request->connect) 
                ->where('connect', $request->connect)  
                ->where('service', 'like', '%'.$request->get('search').'%')   
                ->get();
            }

            return json_encode($devices);
            
        }

    }

}
