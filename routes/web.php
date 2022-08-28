<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\ManageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', [LoginController::class,'index']);
Route::post('/dashboard', [LoginController::class,'dashboard']);

Route::get('/dashboard/detail', [ManageController::class,'index'])->name('admin');






// Route::prefix('login')->group(function(){
//     Route::get('/forgotpassword', function () {
//         return view('forgotpassword');
//     });
//     Route::get('/account', function () {
//         return view('account');
//     });
// });

// Route::get('/dashboard', function () {
//     return view('day');
// });

