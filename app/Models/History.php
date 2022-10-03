<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class History extends Model
{
    use HasFactory;
    protected $table = 'log_activities';
    protected $fillable = [
        'subject', 'url', 'date', 'ip', 'agent', 'username'
    ];
    
    public function getAllHistory($perPage=null){
        $histories  = DB::table($this->table);
        //Pagination
        if(!empty($perPage)){
            $histories = $histories->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $histories = $histories->get(); // khong phan trang
        }
        return $histories;
    }
}
