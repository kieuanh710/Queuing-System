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

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->boardcasts = new BoardCast();
        $this->boardcasts  = new Service();
    }
    //Danh sách cấp số
    public function index(Request $request){
        $title = 'Quản lý cấp số';
     
        $boardcastList = $this->boardcasts->getAllBoardCast(self::_PER_PAGE);
        $serviceList = $this->boardcasts ->getAllService();
        return view('manage.boardcast.main', compact('title', 'boardcastList', 'serviceList'));
    }

    // cấp số mới
    public function add(){
        $title = 'Cấp số mới';
        $serviceList = $this->boardcasts ->getAllService();
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
        // $status = $request->status;
        // $service = $request->service;
        // $source = $request->source;
        // $start_date = $request->start;
        // $end_date = $request->end;

        if($request->ajax()){
            // search
            if(!empty($search)) {
                $request->get('search');
                $boardcasts = $this->boardcasts->getAllBoardCast(self::_PER_PAGE)
                // ->where('name', 'like', '%'.$request->get('search').'%')
                ->where('service.nameService', 'like', '%'.$request->get('search').'%')   
                ->orwhere('source', 'like', '%'.$request->get('search').'%')   
                ->get();
            }
            // filter
            // if($service == 0 ){
            //     if($status == 0){
            //         if($source == 0 && $start == null &&  $end == null){
            //             $boardcasts = $this->boardcasts
            //             ->where('name', 'like', '%'.$request->get('search').'%')
            //             ->orwhere('nameService', 'like', '%'.$request->get('search').'%')   
            //             ->orwhere('source', 'like', '%'.$request->get('search').'%')   
            //             ->get();
            //         }
            //         elseif($source != 0 && $start == null &&  $end == null){
            //             $boardcasts = $this->boardcasts
            //             ->where('source', $request->source)
            //             ->where('name', 'like', '%'.$request->get('search').'%')
            //             ->where('nameService', 'like', '%'.$request->get('search').'%')   
            //             ->get();
            //         } else {
            //             $boardcasts = $this->boardcasts
            //             ->whereDate('created_at', '>=', $start)
            //             ->whereDate('created_at', '<=', $end)
            //             ->where('name', 'like', '%'.$request->get('search').'%')
            //             ->where('nameService', 'like', '%'.$request->get('search').'%')   
            //             ->get();
            //         }
            //     }
            //     else{
            //         if($source == 0 && $start == null &&  $end == null){
            //             $boardcasts = $this->boardcasts
            //             ->where('name', 'like', '%'.$request->get('search').'%')
            //             ->orwhere('nameService', 'like', '%'.$request->get('search').'%')   
            //             ->orwhere('source', 'like', '%'.$request->get('search').'%')   
            //             ->get();
            //         }
            //         elseif($source != 0 && $start == null &&  $end == null){
            //             $boardcasts = $this->boardcasts
            //             ->where('source', $request->source)
            //             ->where('name', 'like', '%'.$request->get('search').'%')
            //             ->where('nameService', 'like', '%'.$request->get('search').'%')   
            //             ->get();
            //         } else {
            //             $boardcasts = $this->boardcasts
            //             ->whereDate('created_at', '>=', $start)
            //             ->whereDate('created_at', '<=', $end)
            //             ->where('name', 'like', '%'.$request->get('search').'%')
            //             ->where('nameService', 'like', '%'.$request->get('search').'%')   
            //             ->get();
            //         }
            //     }
            // } 
            // else{
            //     $boardcasts = $this->boardcasts
            //     ->where('service', $request->service) 
            //     ->where('status', $request->status) 
            //     ->where('name', 'like', '%'.$request->get('search').'%')
            //     ->where('nameService', 'like', '%'.$request->get('search').'%')    
            //     ->get();
            // }
            return json_encode($boardcasts);
        }
    }

    public function getBoardCast(Request $request){
        $search = $request->search;
        $status = $request->status;
        $start = $request->start;
        $end = $request->end;

        if($request->ajax()){
            // search
            // if(!empty($search)) {
            //     $request->get('search');
            //     $boardcasts = $this->boardcasts->getAllBoardCast(self::_PER_PAGE)
            //     ->where('number', 'like', '%'.$request->get('search').'%')   
            //     ->orwhere('status', 'like', '%'.$request->get('search').'%')   
            //     ->get();
            // }
            // filter
            // if($status == 0 && $start == null &&  $end == null){
            //     $boardcasts  = $this->boardcasts 
            //     ->where('nameService', 'like', '%'.$request->get('search').'%')    
            //     ->get();
            // } 
            
            if($start != null ||  $end != null){
                $boardcasts  = $this->boardcasts 
                // ->whereBetween('created_at', [$start, $end])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->get();
            } 
            elseif($status != 0 && $start == null || $end == null){
                $boardcasts  = $this->boardcasts 
                ->where('status', $request->status)  
                ->get();
            }
            else{
                $boardcasts  = $this->boardcasts 
                ->whereBetween('created_at', array([$start, $end])) 
                ->where('status', $request->connect)   
                ->get();
            }
            return json_encode($boardcasts);
        }
    }


}
