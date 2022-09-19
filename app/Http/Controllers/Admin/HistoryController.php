<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;
use App\Helpers\LogActivity;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


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

        $keyword = null;
        $start = $request->input('start');
        $end = $request->input('end');
        // $date = DB::table('log_activities')
        //     ->where('method', '>=', $start)
        //     ->where('method', '<=', $end);
        // dd($date);
        //Search
        // if(!empty($request->keyword)){
        //     $keyword = $request->keyword;
        // }

        $historyList = $this->histories->getAllHistory($keyword, self::_PER_PAGE, $start, $end);
       
        $logs = LogActivity::logActivityLists();
        return view('manage.system.history',compact('title','logs', 'historyList'));
    }
    public function search(Request $request){
        // $out = "";
        $request->get('searchFilter');
        // $histories = $this->histories->where('username', 'like', '%'.$request->search.'%')
        //  ->orwhere('subject', 'like', '%'.$request->search.'%')   
        // ->get();
        $histories = $this->histories->where('username', 'like', '%'.$request->get('searchFilter').'%')
        ->orwhere('subject', 'like', '%'.$request->get('searchFilter').'%')   
       ->get();
        // foreach($histories as $history){
        //     $out.= 
        //     '<tr>
        //     <td>'.$history->username.'</td>
        //     <td>'.$history->subject.'</td>
        //     <td>'.$history->method.'</td>
        //     </tr>' ;
        // }
        // return response($out);
        $searchFilter = json_encode($histories);
            return $searchFilter;
        // return view('manage.system.history',compact('title','searchFilter'));

    }
}
