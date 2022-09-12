<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    protected $table = 'services';
    use HasFactory;
    public function getAllService(){
        // $services = DB::select('SELECT * FROM services ORDER BY id ASC');
        DB::enableQueryLog();
        $services = DB::table($this->table)->get();
        // ->select('services.*');

        if(!empty($filters)){
            $services = $services->where($filters);
        }  
        if(!empty($keyword)){
            $services = $services->where(function($query) use ($keyword){
                $query->orWhere('idService', 'like', '%'.$keyword.'%');
                $query->orWhere('nameService', 'like', '%'.$keyword.'%');
                $query->orWhere('desService', 'like', '%'.$keyword.'%');
            });
        } 
        return $services;
    }
    public function addService($data){
        // DB::insert('INSERT INTO services (idService, nameService, desService, created_at, updated_at) 
        // VALUES(?, ?, ?, ?, ?)', $data);
        // DB::insert('INSERT INTO devices (idDevice, nameDevice, ip_address, typeDevice, username, password, service, created_at, updated_at) 
        // VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
        // Insert thành công -> true
        DB::table($this->table)->insert($data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    public function updateService($data, $id){
        $data[] = $id;
        return DB::select('UPDATE '.$this->table.' 
            SET idService=?, nameService=?, desService=?, updated_at=?
            WHERE id = ?',$data);
    }
}
