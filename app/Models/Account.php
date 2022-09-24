<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    protected $fillable = [
        'username', 'name', 'phone', 'email', 'id_role', 'active'
    ];
    protected $guarded = [];
    public function getAllAccount($filters=[], $perPage=null){
        //$accounts = DB::select('SELECT * FROM accounts ORDER BY id ASC');
        //DB::enableQueryLog();
        $accounts = DB::table($this->table)
        ->join('role', 'accounts.id_role', 'role.id')
        ->join('active', 'accounts.active', 'active.id')
        ->select('accounts.*', 'role.nameRole', 'active.nameStatus');

        if(!empty($filters)){
            $accounts = $accounts->where($filters);
        }  
 
        //Pagination
        if(!empty($perPage)){
            $accounts = $accounts->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $accounts = $accounts->get(); // khong phan trang
        }

        return $accounts;
    }

    public function addAccount($data){
        DB::table($this->table)->insert($data);
    }

    //Check id exist in table
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    public function updateAccount($data, $id){
        $data[] = $id;
        return DB::select('UPDATE '.$this->table.' 
            SET name=?, phone=?,email=?, username=?, password=?, repassword=?, id_role=?, active=?, updated_at=?
            WHERE id = ?',$data);
    }
}
