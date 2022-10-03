<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BoardCast;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LogActivity;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;
class ReportController extends Controller
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

        // //Handle sort by
        $sortBy = $request->input('sortby');
        $sortType = $request->input('sorttype');
        $allowSort = ['asc', 'desc'];

        if(!empty($sortType) && in_array($sortType, $allowSort)){
            if($sortType=='desc'){
                $sortType = 'asc';
            }else{
                $sortType = 'desc';
            }
        }else {
            $sortType = 'asc';
        }
        $sortArr = [
            'sortBy' => $sortBy,
            'sortType' => $sortType,
        ];
        $boardcastList = $this->boardcasts->getAllReport($sortArr, self::_PER_PAGE);
        $serviceList = $this->services->getAllService();
        return view('manage.report', compact('title', 'boardcastList', 'serviceList', 'sortType'));
    }
    public function export(){
        return Excel::download(new ReportsExport, 'report.xlsx');
    }

    public function getUsers(Request $request){
        $start= $request->start;
        $end = $request->end;

        if($request->ajax()){  
            // filter
            if($start == null &&  $end == null){
                $boardcasts = $this->getAllBoardCast(self::_PER_PAGE);
            } 
            elseif($start != null ||  $end != null){
                $boardcasts = $this->boardcasts
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->get();
            } 
            // dd($boardcasts);
            return json_encode($boardcasts);
        }

    }
}
