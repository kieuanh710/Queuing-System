<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Image;
// use Nette\Utils\Image;
// use Image;
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
        $title = "Tài khoản cá nhân";
        return view('admin.users.info', compact('title'), array('user' => Auth::user()));
    }
    // upload avarta

    public function upload(Request $request)
    {
        if($request->hasFile('avatar')){
            $filename = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('images',$filename,'public');
            Auth()->user()->update(['avatar'=>$filename]);
        }
        return redirect()->back();
    }
}
