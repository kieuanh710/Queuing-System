<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\CreateFormRequest;
use App\Models\Rule;
use Illuminate\Support\Facades\Session;
class RuleController extends Controller
{
    private $rules;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        // $this->boardcasts = new BoardCast();
    }
    //Danh sách thiết bị
    public function index(){
        $title = '';
        // $reportsList = $this->reports->getAllDevice();
        return view('manage.system.rule.main', compact('title'));
    }
    public function add(){
        $title = 'Thêm vai trò';
        return view('manage.system.rule.addRule', compact('title'));
    }
    public function update(){
        $title = 'Cập nhật vai trò';
        return view('manage.system.rule.updateRule', compact('title'));
    }
}