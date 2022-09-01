<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\ForgotPasswordController;
use App\Http\Controllers\Admin\ManageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "wesb" middleware group. Now create something great!
|
*/


Route::get('/login', [LoginController::class,'index'])->name('login');

Route::get('/forgotpassword', [LoginController::class,'forgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword', [LoginController::class,'password']);
// Route::get('/password/reset/{token}', [LoginController::class,'getpass'])->name('reset');



Route::post('/dashboard', [LoginController::class,'dashboard']);

Route::middleware('auth')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::get('/', [ManageController::class,'index'])->name('admin');
        Route::get('/manage', [ManageController::class,'index']);
        Route::get('/manage/device', [ManageController::class,'device'])->name('device');

    });

});



    



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

