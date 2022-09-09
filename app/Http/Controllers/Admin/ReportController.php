<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\CreateFormRequest;
use App\Http\Services\Manage\ReportService;
use App\Models\Report;
use Illuminate\Support\Facades\Session;
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
        return view('manage.report', compact('title'));
    }
}
