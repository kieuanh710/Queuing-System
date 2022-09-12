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
    public function index(Request $request){
        $title = 'Quản lý dịch vụ';

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
            $filters[] = ['services.active', '=', $active];
        }

        //Search
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
        }
        
        $serviceList = $this->services->getAllService();
        return view('manage.service.main', compact('title','serviceList'));
    }
    // Thêm thiết bị
    public function add(){
        $title = 'Thêm dịch vụ';
        return view('manage.service.addService', compact('title'));
    }

    public function postAdd(Request $request){
        // $this->deviceService->create($request);
        $dataInsert = [
            'idService' =>  $request->idService,
            'nameService' => $request->nameService,
            'desService' => $request->desService,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ];
        // dd($dataInsert);
        $this->services->addService($dataInsert);
        return redirect()->route('service')->with('success', 'Thêm dịch vụ thành công');
    }

    // Cập nhật thông tin thiết bị
    public function update(Request $request, $id){
        $title = 'Cập nhật dịch vụ';
        // Lưu id vào session
        if (!empty($id)){
            $serviceDetail = $this->services->getDetail($id);
            if(!empty($serviceDetail[0])){
                $request->session()->put('id', $id);
                $serviceDetail = $serviceDetail[0];
            }
            else{
                return redirect()->route('service')->with('success', 'Liên kết không tồn tại');
            }
        } 
        else {
            return redirect()->route('service')->with('success', 'Liên kết không tồn tại');
        }
        return view('manage.service.updateService',compact('title', 'serviceDetail'));
    }
    public function postUpdate(Request $request){
        $id = session('id');
        if(empty($id)){
            return back()->with('error', 'Liên kết không tồn tại');
        }
        $dataUpdate = [
            $request->idService,
            $request->nameService,
            $request->desService,
            date('Y-m-d H:i:s')
        ];
        //dd(session('id'));
        $this->services->updateService($dataUpdate, $id);
        return redirect()->route('service')->with('success', 'Cập nhật dịch vụ thành công');
    }

    // Thông tin chi tiết
    public function detail(Request $request){
        $title = 'Chi tiết thiết bị';
        $detail = Service::where('id', $request->id)->first();
        return view('manage.service.detailService', compact ('title', 'detail'));
    }

}
