<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BoardCast extends Model
{
    use HasFactory;
    protected $table = 'boardcasts';
    protected $guarded = [];

    public function getAllBoardCast($perPage=null){
        $boardcasts = DB::table($this->table)
        ->join('accounts', 'boardcasts.id_account', 'accounts.id')
        ->select('boardcasts.*',  'accounts.name','accounts.phone','accounts.email');
        //Pagination
        if(!empty($perPage)){
            $boardcasts = $boardcasts->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $boardcasts = $boardcasts->get(); // khong phan trang
        }

        return $boardcasts;
    }

    // report
    public function getAllReport($sortByArr=null, $perPage=null){
        $boardcasts = DB::table($this->table)
        ->join('accounts', 'boardcasts.id_account', 'accounts.id')
        ->select('boardcasts.*',  'accounts.name','accounts.phone','accounts.email');
        // sortby
        $orderBy='id';
        $orderType = 'asc';

        if(!empty($sortByArr) && is_array($sortByArr)){
            if(!empty($sortByArr['sortBy']) && !empty($sortByArr['sortType'])){
                $orderBy = trim($sortByArr['sortBy']);
                $orderType = trim($sortByArr['sortType']);
            }
            $boardcasts = $boardcasts->orderBy($orderBy, $orderType);
        }      
        //Pagination
        if(!empty($perPage)){
            $boardcasts = $boardcasts->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $boardcasts = $boardcasts->get(); // khong phan trang
        }

        return $boardcasts;
    }

    public function addBoardCast($data){
        DB::table($this->table)->insert($data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    
}
