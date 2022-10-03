<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BoardCast;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Helpers\LogActivity;

class BoardCastController extends Controller
{
    private $boardcasts, $services, $users;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->boardcasts = new BoardCast();
        $this->services  = new Service();
        $this->users  = new User();
    }
    //Danh sách cấp số
    public function index(Request $request){
        $title = 'Quản lý cấp số';
        $boardcastList = $this->boardcasts->getAllBoardCast(self::_PER_PAGE);
        return view('manage.boardcast.main', compact('title', 'boardcastList'));
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
        //dd($request);
        $dataInsert = [
            'number' =>  $request->number,
            'nameService' => $request->nameService,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ];
        // dd($dataInsert);
        $this->boardcasts->addBoardCast($dataInsert);
         $serviceList = $this->services->getAllService(self::_PER_PAGE);
        //LogActivity::addToLog('Thêm cấp số', Auth::user()->username, now());
        return view('manage.boardcast.main', compact('title', 'serviceList'));
    }

    public function detail(Request $request){
        $title = 'Chi tiết cấp số';
        // $detail = BoardCast::where('id', $request->id)->first();
        $detail = $this->boardcasts->getAllBoardCast(self::_PER_PAGE)->where('id', $request->id)->first();
        // dd($detail);
        //LogActivity::addToLog('Xem chi tiết cấp số', Auth::user()->username, now());
        return view('manage.boardcast.detailBoardCast', compact ('title', 'detail'));
    }

       public function getUsers(Request $request){
        $search = $request->search;
        $status = $request->status;
        $nameService = $request->nameService;
        $source = $request->source;
        $start = $request->start;
        $end = $request->end;

        if($request->ajax()){
            // search
            if(!empty($search)) {
                $request->get('search');
                $boardcasts = $this->boardcasts
                ->where('nameService', 'like', '%'.$request->get('search').'%')    
                ->get();
            }
           
            // filter
            if($nameService == 0){
                if($status == 0){
                    if($source == 0){
                        if($start == null &&  $end == null){
                            $boardcasts = $this->boardcasts->getAllBoardCast(self::_PER_PAGE);
                        } 
                        else {
                            $boardcasts = $this->boardcasts
                            ->whereDate('created_at', '>=', $start)
                            ->whereDate('created_at', '<=', $end)
                            ->where('nameService', 'like', '%'.$request->get('search').'%')   
                            ->get();
                        }
                    }
                    else{
                        if($start == null &&  $end == null){
                            $boardcasts = $this->boardcasts
                            ->where('source', $request->source)
                            ->where('nameService', 'like', '%'.$request->get('search').'%')   
                            ->get();
                        } 
                        else{
                            $boardcasts = $this->boardcasts
                            ->where('source', $request->source)
                            ->whereDate('created_at', '>=', $start)
                            ->whereDate('created_at', '<=', $end)
                            ->where('nameService', 'like', '%'.$request->get('search').'%')   
                            ->get();
                        }
                    } 
                }
                else {
                    if($source == 0){
                        if($start == null &&  $end == null){
                            $boardcasts = $this->boardcasts
                            ->where('status', $request->status)
                            ->orwhere('nameService', 'like', '%'.$request->get('search').'%')    
                            ->get();
                        } else {
                            $boardcasts = $this->boardcasts
                            ->where('status', $request->status)
                            ->whereDate('created_at', '>=', $start)
                            ->whereDate('created_at', '<=', $end)
                            ->where('nameService', 'like', '%'.$request->get('search').'%')   
                            ->get();
                        }
                    }
                    else{
                        if($start == null &&  $end == null){
                            $boardcasts = $this->boardcasts
                            ->where('status', $request->status)
                            ->where('source', $request->source)
                            ->where('nameService', 'like', '%'.$request->get('search').'%')   
                            ->get();
                        } else{
                            $boardcasts = $this->boardcasts
                            ->where('status', $request->status)
                            ->where('source', $request->source)
                            ->whereDate('created_at', '>=', $start)
                            ->whereDate('created_at', '<=', $end)
                            ->get();
                        }

                    } 
                }
            } 
            //service
            else{
                if($status == 0){
                    if($source == 0){
                        if($start == null &&  $end == null){
                            $boardcasts = $this->boardcasts
                            ->where('nameService', $request->nameService)
                            ->get();
                        } 
                        else {
                            $boardcasts = $this->boardcasts
                            ->where('nameService', $request->nameService)
                            ->whereDate('created_at', '>=', $start)
                            ->whereDate('created_at', '<=', $end)
                            ->get();
                        }
                    }
                    else{
                        if($start == null &&  $end == null){
                            $boardcasts = $this->boardcasts
                            ->where('nameService', $request->nameService)
                            ->where('source', $request->source)
                            ->where('nameService', 'like', '%'.$request->get('search').'%')   
                            ->get();
                        } 
                        else{
                            $boardcasts = $this->boardcasts
                            ->where('nameService', $request->nameService)
                            ->where('source', $request->source)
                            ->whereDate('created_at', '>=', $start)
                            ->whereDate('created_at', '<=', $end)
                            ->where('nameService', 'like', '%'.$request->get('search').'%')   
                            ->get();
                        }
                    } 
                }
                // status
                else {
                    if($source == 0){
                        if($start == null &&  $end == null){
                            $boardcasts = $this->boardcasts
                            ->where('nameService', $request->nameService)
                            ->where('status', $request->status)
                            ->get();
                        } else {
                            $boardcasts = $this->boardcasts
                            ->where('nameService', $request->nameService)
                            ->where('status', $request->status)
                            ->whereDate('created_at', '>=', $start)
                            ->whereDate('created_at', '<=', $end)
                            ->where('nameService', 'like', '%'.$request->get('search').'%')   
                            ->get();
                        }
                    }
                    else{
                        if($start == null &&  $end == null){
                            $boardcasts = $this->boardcasts
                            ->where('nameService', $request->nameService)
                            ->where('status', $request->status)
                            ->where('source', $request->source)->get();
                        } else{
                            $boardcasts = $this->boardcasts
                            ->where('nameService', $request->nameService)
                            ->where('status', $request->status)
                            ->where('source', $request->source)
                            ->whereDate('created_at', '>=', $start)
                            ->whereDate('created_at', '<=', $end)
                            ->get();
                        }

                    } 
                }
            }
        } 
           
        return json_encode($boardcasts);
    }

}
