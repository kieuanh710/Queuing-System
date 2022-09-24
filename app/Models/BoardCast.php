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
        // $boardcasts = DB::select('SELECT * FROM boardcasts ORDER BY id ASC');
        // DB::enableQueryLog();
        $boardcasts = DB::table($this->table)
        ->join('services', 'boardcasts.id_service', 'services.idService')
        ->join('accounts', 'boardcasts.id_account', 'accounts.id')
        ->select('boardcasts.*', 'services.nameService', 'accounts.name');
 
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
