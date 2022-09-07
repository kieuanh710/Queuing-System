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
    public function getAllDevice($filters=[], $keyword=null){
        //$devices = DB::select('SELECT * FROM devices ORDER BY id ASC');
        //DB::enableQueryLog();
        $devices = DB::table($this->table)
        ->orderBy ('id', 'ASC');

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
        $devices = $devices->get();
        // $sql = DB::getQueryLog();
        // dd($sql);
        return $devices;
    }
    public function addDevice($data){
        DB::insert('INSERT INTO devices (idDevice, nameDevice, ip_address, typeDevice, username, password, service, created_at, updated_at) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
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
    // public function QueryBuilder(){
    //     //lấy tất cả data
    //     $lists = DB::table($this->table)
    //     ->select('idDevice', 'typeDevice')
    //     ->where('id', '>', 2)
    //     ->get();
    //     dd($lists);
    //     // lấy dât đầu tiên
    //     $item = DB::table($this->table)->first();
    //     // dd($item->nameDevice);
    // }

}
