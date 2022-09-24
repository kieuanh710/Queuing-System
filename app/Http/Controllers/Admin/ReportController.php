<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LogActivity;
class ReportController extends Controller
{
    private $reports;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        $this->reports = new Report();
    }
    //Danh sách thiết bị
    public function index(){
        $title = 'Quản lý báo cáo';
        // $reportsList = $this->reports->getAllDevice();
        LogActivity::addToLog('Xem danh sách báo cáo', Auth::user()->username, now());

        return view('manage.report', compact('title'));
    }
}
