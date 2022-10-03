<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    public function getAllRole($perPage=null){
        $roles = DB::table($this->table);
        //Pagination
        if(!empty($perPage)){
            $roles = $roles->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $roles = $roles->get(); // khong phan trang
        }
        return $roles;
    }
    
    public function addRole($data){
        // Insert thành công -> true
        DB::table($this->table)->insert($data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    public function updateRole($data, $id){
        $data[] = $id;
        return DB::select('UPDATE '.$this->table.' 
            SET nameRole=?, desRole=?, function=?, updated_at=?
            WHERE id = ?',$data);
    }
}
