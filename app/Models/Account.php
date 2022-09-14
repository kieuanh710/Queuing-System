<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';
   
    protected $guarded = [];
    public function getAllAccount($filters=[], $keyword=null, $perPage=null){
        //$accounts = DB::select('SELECT * FROM accounts ORDER BY id ASC');
        //DB::enableQueryLog();
        $accounts = DB::table($this->table);

        if(!empty($filters)){
            $accounts = $accounts->where($filters);
        }  
        if(!empty($keyword)){
            $accounts = $accounts->where(function($query) use ($keyword){
                $query->orWhere('username', 'like', '%'.$keyword.'%');
                $query->orWhere('name', 'like', '%'.$keyword.'%');
                $query->orWhere('nameRule', 'like', '%'.$keyword.'%');
            });
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
        // DB::insert('INSERT INTO accounts (idDevice, nameDevice, ip_address, typeDevice, username, password, service, created_at, updated_at) 
        // VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
        // Insert thành công -> true
        DB::table($this->table)->insert($data);
    }

    //Check id exist in table
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    public function updateAccount($data, $id){
        $data[] = $id;
        return DB::select('UPDATE '.$this->table.' 
            SET name=?, phone=?,email=?, username=?, password=?, repassword=?, nameRule=?, active=?, updated_at=?
            WHERE id = ?',$data);
    }
}
