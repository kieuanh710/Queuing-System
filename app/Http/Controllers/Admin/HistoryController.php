<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;
use App\Helpers\LogActivity;


class HistoryController extends Controller
{
    private $histories;
    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->histories = new History();
    }
    //Danh sách thiết bị
    public function index(Request $request){
        $title = 'Nhật kí người dùng';
        $logs = LogActivity::logActivityLists();
        $historyList = $this->histories->getAllHistory(self::_PER_PAGE);
        return view('manage.system.history',compact('title','historyList', 'logs'));
    }
    public function getUsers(Request $request){
        $search = $request->search;
        $start= $request->start;
        $end = $request->end;

        if($request->ajax()){
            // search
            if(!empty($search)) {
                $request->get('search');
                $histories = $this->histories
                ->where('username', 'like', '%'.$request->get('search').'%')
                ->orwhere('subject', 'like', '%'.$request->get('search').'%')  
                ->get();
            }
            // filter
            if($start == null &&  $end == null){
                $histories = $this->histories
                ->where('username', 'like', '%'.$request->get('search').'%')
                ->orwhere('subject', 'like', '%'.$request->get('search').'%')    
                ->get();
            } 
            elseif($start != null ||  $end != null){
                $histories = $this->histories
                // ->whereBetween('created_at', [$start, $end])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->where('username', 'like', '%'.$request->get('search').'%')
                ->where('subject', 'like', '%'.$request->get('search').'%')  
                ->get();
            } 
            else{
                $histories = $this->histories
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->where('username', 'like', '%'.$request->get('search').'%')
                ->orwhere('subject', 'like', '%'.$request->get('search').'%')   
                ->get();
            }
            return json_encode($histories);
        }
    }
}

