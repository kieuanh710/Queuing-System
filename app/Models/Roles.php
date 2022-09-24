<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    public function getAllRole($keyword=null, $perPage=null){
        // $roles = DB::select('SELECT * FROM roles ORDER BY id ASC');
        //DB::enableQueryLog();
        $roles = DB::table($this->table);

        if(!empty($keyword)){
            $roles = $roles->where(function($query) use ($keyword){
                $query->orWhere('nameRole', 'like', '%'.$keyword.'%');
                $query->orWhere('desRole', 'like', '%'.$keyword.'%');
            });
        } 
        
        //Pagination
        if(!empty($perPage)){
            $roles = $roles->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $roles = $roles->get(); // khong phan trang
        }
        
        return $roles;
        
    }
    public function addRole($data){
         DB::insert('INSERT INTO roles (nameRole, desRole, created_at, updated_at) 
        VALUES(?, ?, ?, ?)', $data);
        // Insert thành công -> true
        // DB::table($this->table)->insert($data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    public function updateRole($data, $id){
        $data[] = $id;
        return DB::select('UPDATE '.$this->table.' 
            SET nameRole=?, desRole=?, updated_at=?
            WHERE id = ?',$data);
    }
    public function count(){
        $user = DB::table('users')->where('role')->get()->first();
        $role = DB::table('roles')->where('nameRole')->get()->first();
        if($user == $role){
            $count = DB::table('roles')->where('count')->count();
        }else 
            echo '1';
        return $count;
    }

}
