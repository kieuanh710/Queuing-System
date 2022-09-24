<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BoardCast;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LogActivity;

class BoardCastController extends Controller
{
    private $boardcasts;
    private $services;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->boardcasts = new BoardCast();
        $this->services = new Service();
    }
    //Danh sách cấp số
    public function index(Request $request){
        $title = 'Quản lý cấp số';
     
        $boardcastList = $this->boardcasts->getAllBoardCast(self::_PER_PAGE);
        $serviceList = $this->services->getAllService();
        return view('manage.boardcast.main', compact('title', 'boardcastList', 'serviceList'));
    }

    // cấp số mới
    public function add(){
        $title = 'Cấp số mới';
        $serviceList = $this->services->getAllService();
        return view('manage.boardcast.addBoardCast', compact('title', 'serviceList'));
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
        $this->boardcasts->addBoardCast($dataInsert);
        LogActivity::addToLog('Thêm cấp số', Auth::user()->username, now());
        return redirect()->route('service')->with('success', 'Thêm dịch vụ thành công');
    }

    public function detail(Request $request){
        $title = 'Chi tiết thiết bị';
        $detail = BoardCast::where('id', $request->id)->first();
        LogActivity::addToLog('Xem chi tiết cấp số', Auth::user()->username, now());

        return view('manage.boardcast.detailBoardCast', compact ('title'));
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
                ->where('desService', 'like', '%'.$request->get('search').'%')   
                ->get();
            } 
            elseif($start != null ||  $end != null){
                $services = $this->services
                // ->whereBetween('created_at', [$start, $end])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->where('nameService', 'like', '%'.$request->get('search').'%')   
                ->where('desService', 'like', '%'.$request->get('search').'%')   
                ->get();
            } 
            elseif($active != 0 && $start == null || $end == null){
                $services = $this->services
                ->where('active', $request->active)
                ->where('nameService', 'like', '%'.$request->get('search').'%')   
                ->where('desService', 'like', '%'.$request->get('search').'%')   
                ->get();
            }
            else{
                $services = $this->services
                ->whereBetween('created_at', array([$start, $end])) 
                ->where('active', $request->connect) 
                ->where('nameService', 'like', '%'.$request->get('search').'%')   
                ->where('desService', 'like', '%'.$request->get('search').'%')   
                ->get();
            }
            return json_encode($services);
        }
    }


}
