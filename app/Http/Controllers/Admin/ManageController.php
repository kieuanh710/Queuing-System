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
use PhpOffice\PhpSpreadsheet\Calculation\DateTime;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback;
use Carbon\Carbon;

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

        $dataDay= BoardCast::orderBy('created_at', 'ASC')
        ->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('d');
        });

        $days=[];
        $dayCount=[];
        foreach($dataDay as $day =>$values){
            $days[]=$day;
            $dayCount[]=count($values);
        }

        return view('manage.dashboard-item.dashboard', 
        compact('title', 'total', 'totalUsing', 'totalWait', 'totalPass',
        'totalDevice', 'totalActiveDV', 'totalInactiveDV','totalService', 'totalActiveSV', 'totalInactiveSV'), 
        ['dataDay'=>$dataDay, 'days'=>$days, 'dayCount'=>$dayCount]);
        // return view('manage.dashboard', compact('title'));
    }

    public function month(){
        $title = 'Dashboard';
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

        $data= BoardCast::orderBy('created_at', 'ASC')
        ->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        $months=[];
        $monthCount=[];
        foreach($data as $month =>$values){
            $months[]=$month;
            $monthCount[]=count($values);
        }

        return(view('manage.dashboard-item.dashboardMonth', 
        compact('title', 'total', 'totalUsing', 'totalWait', 'totalPass',
        'totalDevice', 'totalActiveDV', 'totalInactiveDV','totalService', 'totalActiveSV', 'totalInactiveSV'), 
        ['data'=>$data, 'months'=>$months, 'monthCount'=>$monthCount]));
    }

    public function week(){
        $title = 'Dashboard';
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

        $dataWeek= BoardCast::orderBy('created_at', 'ASC')
        ->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('W');
        });

        $weeks=[];
        $weekCount=[];
        foreach($dataWeek as $week =>$values){
            $weeks[]=$week;
            $weekCount[]=count($values);
        }

        return(view('manage.dashboard-item.dashboardWeek', 
        compact('title', 'total', 'totalUsing', 'totalWait', 'totalPass',
        'totalDevice', 'totalActiveDV', 'totalInactiveDV','totalService', 'totalActiveSV', 'totalInactiveSV'), 
        ['dataWeek'=>$dataWeek, 'weeks'=>$weeks, 'weekCount'=>$weekCount]));
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
