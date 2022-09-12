<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\CreateFormRequest;
use App\Models\BoardCast;
use Illuminate\Support\Facades\Session;
class BoardCastController extends Controller
{
    private $boardcasts;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        // $this->boardcasts = new BoardCast();
    }
    //Danh sách thiết bị
    public function index(){
        $title = 'Quản lý cấp số';
        // $reportsList = $this->reports->getAllDevice();
        return view('manage.boardcast.main', compact('title'));
    }
    public function add(){
        $title = 'Cấp số mới';
        return view('manage.boardcast.addBoardCast', compact('title'));
    }
    public function detail(){
        $title = 'Chi tiết thiết bị';
        // $detail = Device::where('id', $request->id)->first();
        return view('manage.boardcast.detailBoardCast', compact ('title'));
    }
}
