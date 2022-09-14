<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;

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
        //Search
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
        }

        $historyList = $this->histories->getAllHistory($keyword, self::_PER_PAGE);
    
        return view('manage.system.history', compact('title', 'historyList'));
    }
}
