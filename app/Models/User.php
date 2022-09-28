<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'username',
        'phone',
        'role', 
        'active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAllUser($perPage=null){
        $users = DB::table('users')
        ->join('roles', 'users.role', 'roles.id')
        ->join('active', 'users.active', 'active.id')
        ->select('users.*', 'roles.nameRole', 'active.nameStatus');
        
        if(!empty($perPage)){
            $users = $users->paginate($perPage)->withQueryString(); // giữ nguyên link filter khi chuyển trang page=x
        }else{
            $users = $users->get(); // khong phan trang
        }

        return $users;
    }

    public function addAccount($data){
        DB::table('users')->insert($data);
    }

    public function updateAccount($data, $id){
        $data[] = $id;
        return DB::select('UPDATE users
            SET name=?, phone=?,email=?, username=?, password=?, repassword=?, role=?, active=?, updated_at=?
            WHERE id = ?',$data);
    }


    public function getDetail($id){
        return DB::select('SELECT * FROM users WHERE id = ?',[$id]);
    }


    public function resetpassword(Request $request){
        $request->validate([
            // 'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                            'email' => $request->email, 
                            'token' => $request->token
                            ])->get();
        
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
        
        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();
    }
}
