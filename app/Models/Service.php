<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Service extends Model
{
    use HasFactory;
    use Searchable;
    protected $table = 'services';
    protected $guarded = [];
    protected $searchable = [
        'columns' => [
            'services.number' => 10,
            'services.status' => 10,
            'service.active' => 10,
            'service.nameService' => 10,
        ]
    ];
    public function getAllService($perPage=null){
        $services = DB::table($this->table);
        //Pagination
        if(!empty($perPage)){
            $services = $services->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $services = $services->get(); // khong phan trang
        }
        return $services;
    }
    public function addService($data){
        DB::table($this->table)->insert($data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    public function updateService($data, $id){
        $data[] = $id;
        return DB::select('UPDATE '.$this->table.' 
            SET idService=?, nameService=?, desService=?, start=?, end=?, prefix=?, sunfix=?, updated_at=?
            WHERE id = ?',$data);
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();
 
        // Customize the data array...
 
        return $array;
    }
}
