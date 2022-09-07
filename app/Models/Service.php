<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory;
    public function getAllDevice(){
        //$devices = DB::select('SELECT * FROM devices ORDER BY id ASC');
        //DB::enableQueryLog();
        $services = DB::table($this->table);
        return $services;
    }
}
