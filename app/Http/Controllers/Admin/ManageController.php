<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index(){
        return view('manage.dashboard');
    }
    public function device(){
        return view('manage.device',[
            'title' => 'Quản lý thiết bị'
        ]);
    }
}
