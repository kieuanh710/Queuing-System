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
    public function getAllBoardCast($filters=[],$keyword=null, $perPage=null){
        // $boardcasts = DB::select('SELECT * FROM boardcasts ORDER BY id ASC');
        // DB::enableQueryLog();
        $boardcasts = DB::table($this->table);

        //filter
        if(!empty($filters)){
            $boardcasts = $boardcasts->where($filters);
        }  
        if(!empty($keyword)){
            $boardcasts = $boardcasts->where(function($query) use ($keyword){
                $query->orWhere('idBoardCast', 'like', '%'.$keyword.'%');
                $query->orWhere('nameBoardCast', 'like', '%'.$keyword.'%');
                $query->orWhere('desBoardCast', 'like', '%'.$keyword.'%');
            });
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
        DB::insert('INSERT INTO boardcasts (idBoardCast, nameBoardCast, desBoardCast, created_at, updated_at) 
        VALUES(?, ?, ?, ?, ?)', $data);
        // Insert thành công -> true
        // DB::table($this->table)->insert($data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    
}
