<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Image;
use App\Models\BoardCast;
use App\Models\Service;
use App\Models\Device;
use Illuminate\Support\Facades\DB;
// use Nette\Utils\Image;
// use Image;
class ManageController extends Controller
{
    private $total;
    public function __construct(){
        $total = new BoardCast();
    }
    public function index(){
        $title = 'Dashboard';
        // bỏadcast
        $total = BoardCast::select('number')->count();
        $totalWait = BoardCast::where('number', '=', '1')->count();
        $totalUsing = BoardCast::where('number', '=', '2')->count();
        $totalPass = BoardCast::where('number', '=', '3')->count();

        //Device
        $totalDevice = Device::select('idDevice')->count();
        $totalActiveDV = Device::where('active', '=', '1')->count();
        $totalInactiveDV = Device::where('active', '=', '2')->count();

        //Service
        $totalService = Service::select('idService')->count();
        $totalActiveSV = Service::where('active', '=', '1')->count();
        $totalInactiveSV = Service::where('active', '=', '2')->count();
        

        // $data = DB::table('devices')
        // ->select(
        //     DB::raw('active as active'),
        //     DB::raw('count(*) as number'))
        // ->groupBy('active')
        // ->get();
        // $array[] = ['Active', 'Number'];
        // foreach($data as $key => $value)
        // {
        //     $array[++$key] = [$value->active, $value->number];
        // }

        return view('manage.dashboard', 
        compact('title', 'total', 'totalUsing', 'totalWait', 'totalPass',
        'totalDevice', 'totalActiveDV', 'totalInactiveDV','totalService', 'totalActiveSV', 'totalInactiveSV',
        ));
        // return view('manage.dashboard', compact('title'));
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
