<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Device extends Model
{
    use HasFactory;
    protected $table = 'devices';
    protected $fillabel = [
        'idDevice',
        'nameDevice',
        'typeDevice',
        'ip_address',
        'username',
        'password',
        'service'
    ];
    protected $guarded = [];
    public function getAllDevice($filters=[], $keyword=null, $sortBy=null, $perPage=null){
        //$devices = DB::select('SELECT * FROM devices ORDER BY id ASC');
        //DB::enableQueryLog();
        $devices = DB::table($this->table);

        $orderBy='id';
        $orderType = 'asc';

        if(!empty($sortByArr) && is_array($sortByArr)){
            if(!empty($sortByArr['sortBy']) && !empty($sortByArr['sortType'])){
                $orderBy = trim($sortByArr['sortBy']);
                $orderType = trim($sortByArr['sortType']);
           }
        }      
        $devices = $devices->orderBy($orderBy, $orderType);

        if(!empty($filters)){
            $devices = $devices->where($filters);
        }  
        if(!empty($keyword)){
            $devices = $devices->where(function($query) use ($keyword){
                $query->orWhere('idDevice', 'like', '%'.$keyword.'%');
                $query->orWhere('nameDevice', 'like', '%'.$keyword.'%');
                $query->orWhere('service', 'like', '%'.$keyword.'%');
            });
        } 
        
        //Pagination
        if(!empty($perPage)){
            $devices = $devices->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $devices = $devices->get(); // khong phan trang
        }

        // $sql = DB::getQueryLog();
        // dd($sql);
        return $devices;
    }

    public function addDevice($data){
        // DB::insert('INSERT INTO devices (idDevice, nameDevice, ip_address, typeDevice, username, password, service, created_at, updated_at) 
        // VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
        // Insert thành công -> true
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
