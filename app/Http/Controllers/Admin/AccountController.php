<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\CreateFormRequest;
use App\Models\Rule;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    private $accounts;

    const _PER_PAGE = 10; // số hàng dữ liệu trên 1 bảng
    public function __construct(){
        // $this->boardcasts = new BoardCast();
    }
    //Danh sách thiết bị
    public function index(){
        $title = 'Danh sách tài khoản';
        // $reportsList = $this->reports->getAllDevice();
        return view('manage.system.account.main', compact('title'));
    }
    public function add(){
        $title = 'Thêm tài khoản';
        return view('manage.system.account.addAccount', compact('title'));
    }
    public function update(){
        $title = 'Cập nhật tài khoản';
        return view('manage.system.account.updateAccount', compact('title'));
    }
}
