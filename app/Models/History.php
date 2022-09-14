<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class History extends Model
{
    use HasFactory;
    protected $table = 'histories';
   
    public function getAllHistory($keyword=null, $perPage=null){
        $histories  = DB::table($this->table);

        if(!empty($keyword)){
            $histories = $histories->where(function($query) use ($keyword){
                $query->orWhere('idDevice', 'like', '%'.$keyword.'%');
                $query->orWhere('nameDevice', 'like', '%'.$keyword.'%');
                $query->orWhere('service', 'like', '%'.$keyword.'%');
            });
        } 
        
        //Pagination
        if(!empty($perPage)){
            $histories = $histories->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $histories = $histories->get(); // khong phan trang
        }

        return $histories;
    }
}
