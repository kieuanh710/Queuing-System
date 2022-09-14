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
        $this->boardcasts = new BoardCast();
    }
    //Danh sách thiết bị
    public function index(Request $request){
        $title = 'Quản lý cấp số';
        $filters = [];
        $keyword = null;

        // Check click active
        if(!empty($request->active)){
            $active = $request->active;
            if($active=='active'){
                $active = 1;
            } else{
                $active = 0;
            }
            $filters[] = ['boardcasts.active', '=', $active];
        }

        //Search
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
        }
        
        $boardcastList = $this->boardcasts->getAllBoardCast($filters, $keyword, self::_PER_PAGE);
        // $reportsList = $this->reports->getAllDevice();
        return view('manage.boardcast.main', compact('title', 'boardcastList'));
    }
    // Thêm thiết bị
    public function add(){
        $title = 'Cấp số mới';
        return view('manage.boardcast.addBoardCast', compact('title'));
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
        $this->services->addService($dataInsert);
        return redirect()->route('service')->with('success', 'Thêm dịch vụ thành công');
    }
    public function detail(Request $request){
        $title = 'Chi tiết thiết bị';
        $detail = BoardCast::where('id', $request->id)->first();
        return view('manage.boardcast.detailBoardCast', compact ('title'));
    }
}
