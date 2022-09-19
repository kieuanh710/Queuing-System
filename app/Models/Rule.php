<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rule extends Model
{
    use HasFactory;
    protected $table = 'rules';
    public function getAllRule($keyword=null, $perPage=null){
        // $rules = DB::select('SELECT * FROM rules ORDER BY id ASC');
        //DB::enableQueryLog();
        $rules = DB::table($this->table);

        if(!empty($keyword)){
            $rules = $rules->where(function($query) use ($keyword){
                $query->orWhere('nameRole', 'like', '%'.$keyword.'%');
                $query->orWhere('desRule', 'like', '%'.$keyword.'%');
            });
        } 
        
        //Pagination
        if(!empty($perPage)){
            $rules = $rules->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $rules = $rules->get(); // khong phan trang
        }
        
        return $rules;
        
    }
    public function addRule($data){
         DB::insert('INSERT INTO rules (nameRole, desRule, created_at, updated_at) 
        VALUES(?, ?, ?, ?)', $data);
        // Insert thành công -> true
        // DB::table($this->table)->insert($data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);
    }
    public function updateRule($data, $id){
        $data[] = $id;
        return DB::select('UPDATE '.$this->table.' 
            SET nameRole=?, desRule=?, updated_at=?
            WHERE id = ?',$data);
    }
    public function count(){
        $user = DB::table('users')->where('rule')->get()->first();
        $rule = DB::table('rules')->where('nameRole')->get()->first();
        if($user == $rule){
            $count = DB::table('rules')->where('count')->count();
        }else 
            echo '1';
        return $count;
    }

}
