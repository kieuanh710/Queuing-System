<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
   
    protected $guarded = [];
    public function getAllRole(){
        $roles = DB::table($this->table)->get();
        return $roles;
    }
}
