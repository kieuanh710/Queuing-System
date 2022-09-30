<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BoardCast;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\LogActivity;

class BoardCastController extends Controller
{
    private $boardcasts, $services;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->boardcasts = new BoardCast();
        $this->services  = new Service();
    }
    //Danh sách cấp số
    public function index(Request $request){
        $title = 'Quản lý cấp số';
     
        $boardcastList = $this->boardcasts->getAllBoardCast(self::_PER_PAGE);
        $serviceList = $this->services ->getAllService();
        return view('manage.boardcast.main', compact('title', 'boardcastList', 'serviceList'));
    }

    // cấp số mới
    public function add(){
        $title = 'Cấp số mới';
        $serviceList = $this->services->getAllService(self::_PER_PAGE);
        // dd($serviceList);
        return view('manage.boardcast.addBoardCast', compact('title', 'serviceList'));
    }

    public function postAdd(Request $request){   
        $title = 'Cấp số mới';
        $request->validate(
            [
                'number' => 'required',
                'nameService' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
            ]);
        $dataInsert = [
            'number' =>  $request->number,
            'id_service' => $request->nameService,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ];
        // dd($dataInsert);
        $this->boardcasts->addBoardCast($dataInsert);
        //    echo 'hi';
         $serviceList = $this->services->getAllService(self::_PER_PAGE);
        // LogActivity::addToLog('Thêm cấp số', Auth::user()->username, now());
        return view('manage.boardcast.main', compact('title', 'serviceList'));
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
