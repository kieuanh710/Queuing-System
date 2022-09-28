<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Device extends Model
{
    use HasFactory;
    protected $table = 'devices';
    protected $fillable = [
        'idDevice', 'nameDevice', 'typeDevice', 'ip_address', 'password', 'username'
    ];
    protected $guarded = [];
    public function getAllDevice($perPage=null){
        //$devices = DB::select('SELECT * FROM devices ORDER BY id ASC');
        //DB::enableQueryLog();
        $devices = DB::table($this->table);

        // $orderBy='id';
        // $orderType = 'asc';
        
        // //sortby
        // if(!empty($sortByArr) && is_array($sortByArr)){
        //     if(!empty($sortByArr['sortBy']) && !empty($sortByArr['sortType'])){
        //         $orderBy = trim($sortByArr['sortBy']);
        //         $orderType = trim($sortByArr['sortType']);
        //    }
        // }      
        // $devices = $devices->orderBy($orderBy, $orderType);

        // if(!empty($filters)){
        //     $devices = $devices->where($filters);
        // }  
        // if(!empty($keyword)){
        //     $devices = $devices->where(function($query) use ($keyword){
        //         $query->orWhere('idDevice', 'like', '%'.$keyword.'%');
        //         $query->orWhere('nameDevice', 'like', '%'.$keyword.'%');
        //         $query->orWhere('service', 'like', '%'.$keyword.'%');
        //     });
        // } 
        
        //Pagination
        if(!empty($perPage)){
            $devices = $devices->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $devices = $devices->get(); // khong phan trang
        }

        return $devices;
    }

    public function addDevice($data){
        DB::table($this->table)->insert($data);
    }

    //Check id exist in table
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    public function updateDevice($data, $id){
        $data[] = $id;
        return DB::select('UPDATE '.$this->table.' 
            SET idDevice=?, nameDevice=?, ip_address=?, typeDevice=?, username=?, password=?, service=?, updated_at=?
            WHERE id = ?',$data);
    }
}
