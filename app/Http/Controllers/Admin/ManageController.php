<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index(){
        // return view('manage.dashboard');
        return 'Admin';
    }
}
