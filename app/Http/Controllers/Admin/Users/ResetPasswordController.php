<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;

class ResetPasswordController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo(){
        if(Auth()->user()->role == 1){
            return 'view admin';
        }
        elseif(Auth()->user()->role == 2){
            return 'view user';
        }
    }

}
