<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index(){
        $title = 'Dashboard';
        return view('manage.dashboard', compact('title'));
    }
    public function device(){
        return view('manage.device.main',[
            'title' => 'Quản lý thiết bị'
        ]);
    }
    public function info(){
        return view('manage.account',[
            'title' => 'Thông tin cá nhân'
        ]);
    }
}
