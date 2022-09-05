<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Device extends Model
{
    use HasFactory;
    protected $table = 'devices';
    protected $fillabel = [
        'idDevice',
        'nameDevice',
        'typeDevice',
        'ip_address',
        'username',
        'password',
        'service'
    ];
    protected $guarded = [];
    public function getAllDevice(){
        $devices = DB::select('SELECT * FROM devices ORDER BY created_at DESC');
        return $devices;
    }
    public function addDevice($data){
        DB::insert('INSERT INTO devices (idDevice, nameDevice, ip_address, typeDevice, username, password, service) 
        VALUES(?, ?, ?, ?, ?, ?, ?)', $data);
    }
}
