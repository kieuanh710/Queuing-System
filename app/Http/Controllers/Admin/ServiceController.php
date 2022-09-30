<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LogActivity;
use Carbon\Carbon;
use App\Models\BoardCast;
class ServiceController extends Controller
{
    private $services, $boardcasts;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->services = new Service();
        $this->boardcasts = new BoardCast();
    }

    //Danh sách thiết bị
    public function index(Request $request){
        $title = 'Quản lý dịch vụ';
        $serviceList = $this->services->getAllService(self::_PER_PAGE);
        return view('manage.service.main', compact('title','serviceList'));
    }
    // Thêm thiết bị
    public function add(){
        $title = 'Thêm dịch vụ';
        return view('manage.service.addService', compact('title'));
    }

    public function postAdd(Request $request){
        $request->validate(
        [
            'idService' => 'required|unique:services',
            'nameService' => 'required',
        ],
        [
            'idService.required' =>  'Nhập mã dịch vụ',
            'idService.unique' =>  'Mã dịch vụ đã tồn tại',
            'nameService.required' => 'Nhập tên dịch vụ',
        ]);
        
        // $this->serviceservice->create($request);
        $dataInsert = [
            'idService' =>  $request->idService,
            'nameService' => $request->nameService,
            'desService' => $request->desService,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ];
        // dd($dataInsert);
        LogActivity::addToLog('Thêm dịch vụ', Auth::user()->username, now());
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
        LogActivity::addToLog('Cập nhật dịch vụ', Auth::user()->username, now());
        $this->services->updateService($dataUpdate, $id);
        return redirect()->route('service')->with('success', 'Cập nhật dịch vụ thành công');
    }

    // Thông tin chi tiết
    public function detail(Request $request){
        $title = 'Chi tiết thiết bị';

        LogActivity::addToLog('Xem chi tiết dịch vụ', Auth::user()->username, now());
        $detail = Service::where('id', $request->id)->first();
        $boardcastList= $this->boardcasts->getAllBoardCast(self::_PER_PAGE);
        return view('manage.service.detailService', compact ('title', 'detail', 'boardcastList'));
    }

    public function getUsers(Request $request){
        $search = $request->search;
        $active = $request->active;
        $start= $request->start;
        $end = $request->end;

        if($request->ajax()){
            // search
            if(!empty($search)) {
                $request->get('search');
                $services = $this->services
                ->where('idService', 'like', '%'.$request->get('search').'%')
                ->orwhere('nameService', 'like', '%'.$request->get('search').'%')   
                ->orwhere('desService', 'like', '%'.$request->get('search').'%')   
                ->get();
            }
            // filter
            if($active == 0 && $start == null &&  $end == null){
                $services = $this->services
                ->where('nameService', 'like', '%'.$request->get('search').'%')    
                ->get();
            } 
            elseif($active == 0 &&$start != null ||  $end != null){
                $services = $this->services
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->where('nameService', 'like', '%'.$request->get('search').'%') 
                ->get();
            } 
            elseif($active != 0 && $start == null || $end == null){
                $services = $this->services
                ->where('active', $request->active)
                ->where('nameService', 'like', '%'.$request->get('search').'%')   
                ->get();
            }
            else{
                $services = $this->services
                ->whereBetween('created_at', array([$start, $end])) 
                ->where('active', $request->connect) 
                ->where('nameService', 'like', '%'.$request->get('search').'%')   
                ->get();
            }
            return json_encode($services);
        }
    }



    
    public function getBoardCast(Request $request){
        $search = $request->search;
        $status = $request->status;
        $start= $request->start;
        $end = $request->end;

        if($request->ajax()){
            // search
            if(!empty($search)) {
                $request->get('search');
                $boardcasts = $this->boardcasts
                ->where('idBoardCast', 'like', '%'.$request->get('search').'%') 
                ->get();
            }
            // filter
            if($status != null){
                $boardcasts = $this->boardcasts
                ->where('status', $request->status)->get();
            }
            // if($status == 0 && $start == null &&  $end == null){
            //     $boardcasts = $this->boardcasts 
            //     ->get();
            // } 
            // elseif($start != null ||  $end != null){
            //     $boardcasts = $this->boardcasts
            //     // ->whereBetween('created_at', [$start, $end])
            //     ->whereDate('created_at', '>=', $start)
            //     ->whereDate('created_at', '<=', $end)                
            //     ->get();
            // } 
            // elseif($status != 0 && $start == null || $end == null){
            //     $boardcasts = $this->boardcasts
            //     ->where('status', $request->status)
            //     ->where('idBoardCast', 'like', '%'.$request->get('search').'%')   
            //     ->get();
            // }
            // else{
            //     $boardcasts = $this->boardcasts
            //     ->whereBetween('created_at', array([$start, $end])) 
            //     ->where('status', $request->connect)                 
            //     ->where('idBoardCast', 'like', '%'.$request->get('search').'%') 
            //     ->get();
            // }
            return json_encode($boardcasts);
        }
    }
}
