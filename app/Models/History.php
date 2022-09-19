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
        'subject', 'url', 'method', 'ip', 'agent', 'username'
    ];
    
    public function getAllHistory($keyword=null, $perPage=null, $start_date, $end_date){
        $histories  = DB::table($this->table);
        // Search with keyword
        // if(!empty($keyword)){
        //     $histories = $histories->where(function($query) use ($keyword){
        //         $query->orWhere('username', 'like', '%'.$keyword.'%');
        //         $query->orWhere('subject', 'like', '%'.$keyword.'%');
        //         $query->orWhere('ip', 'like', '%'.$keyword.'%');
        //     });
        // } 
        // if(!empty($start) && !empty($end)){
        //     $date = $histories->where('method', '>=', $start)
        //     ->where('method', '<=', $end);
        //     dd($date);
        // }
        
        //Pagination
        if(!empty($perPage)){
            $histories = $histories->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $histories = $histories->get(); // khong phan trang
        }


        return $histories;
    }
    // public function searchDate($start_date, $end_date){
    //     $histories = DB::table($this->table)->select()
    //     ->where('date', '>=', $start_date)
    //     ->where('date', '>=', $end_date)
    //     ->get();
    //     // dd($histories);
    //     return $histories;
        
    // }
    
}
