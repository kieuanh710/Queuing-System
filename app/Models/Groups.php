<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Groups extends Model
{
    use HasFactory;
    protected $table = 'group';
    public function getALL(){
        $groups = DB::table($this->table)->get();
    }

}
