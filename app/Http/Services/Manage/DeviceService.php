<?php
namespace App\Http\Services\Manage;

use App\Models\Device;
use TheSeer\Tokenizer\Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class DeviceService{
    public function getAll(){
        return Device::orderbyDesc('id')->paginate(10);
    }
    public function create($request){
        try{
            //Lấy thông tin từ form để xử lý
            //dd($request->input());
            Device::create([
                'idDevice' =>  $request->input('idDevice'),
                'nameDevice' => $request->input('nameDevice'),
                'typeDevice' => $request->input('typeDevice'),
                'ip_address' => $request->input('ip_address'),
                'username' => $request->input('username'),
                'password' => $request->input('password'),
                'service' => $request->input('service')
            ]);
            //Thông báo create thành công
            Session::flash('success', 'Tạo dữ liệu thành công');
        } catch(Exception $err){
            Session::flash('error', 'Tạo dữ liệu thất bại');
            return false;
        }
        return true;
    }
}
?>