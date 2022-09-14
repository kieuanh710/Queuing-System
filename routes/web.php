<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\ForgotPasswordController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\BoardCastController;
use App\Http\Controllers\Admin\RuleController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\HistoryController;


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
Route::post('/dashboard', [LoginController::class,'dashboard'])->name('dashboard');
Route::get('/fail', [LoginController::class,'fail'])->name('fail');
Route::get('/forgotpassword', [LoginController::class,'forgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword', [LoginController::class,'password']);
Route::get('/password/reset/{token}', [LoginController::class,'getpass'])->name('reset');

Route::middleware('auth')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::get('/', [ManageController::class,'index'])->name('admin');
        Route::get('/info', [ManageController::class,'info'])->name('info');
        Route::prefix('/manage')->group(function(){
            Route::get('/', [ManageController::class,'index']);

            Route::prefix('/device')->group(function(){
                Route::get('/', [DeviceController::class,'index'])->name('device');
                Route::get('/add', [DeviceController::class,'add'])->name('device.add');
                Route::post('/add', [DeviceController::class,'postAdd']);
                Route::get('/update/{id}', [DeviceController::class,'update'])->name('device.update');
                Route::post('/update', [DeviceController::class,'postUpdate'])->name('device.postUpdate');
                Route::get('/detail', [DeviceController::class,'detail'])->name('device.detail');
            });
            
            Route::prefix('/service')->group(function(){
                Route::get('/', [ServiceController::class,'index'])->name('service');
                Route::get('/add', [ServiceController::class,'add'])->name('service.add');
                Route::post('/add', [ServiceController::class,'postAdd']);
                Route::get('/update/{id}', [ServiceController::class,'update'])->name('service.update');
                Route::post('/update', [ServiceController::class,'postUpdate'])->name('service.postUpdate');
                Route::get('/detail', [ServiceController::class,'detail'])->name('service.detail');
            });

            Route::prefix('/boardcast')->group(function(){
                Route::get('/', [BoardCastController::class,'index'])->name('boardcast');
                Route::get('/add', [BoardCastController::class,'add'])->name('boardcast.add');
                Route::post('/add', [BoardCastController::class,'postAdd']);
                Route::get('/detail', [BoardCastController::class,'detail'])->name('boardcast.detail');
            });

            Route::prefix('/report')->group(function(){
                Route::get('/', [ReportController::class,'index'])->name('report');
            });
            Route::prefix('/system')->group(function(){
                Route::prefix('/rule')->group(function(){
                    Route::get('/', [RuleController::class,'index'])->name('rule');
                    Route::get('/add', [RuleController::class,'add'])->name('rule.add');
                    Route::post('/add', [RuleController::class,'postAdd']);
                    Route::get('/update/{id}', [RuleController::class,'update'])->name('rule.update');
                    Route::post('/update', [RuleController::class,'postUpdate'])->name('rule.postUpdate');
                });
                Route::prefix('/account')->group(function(){
                    Route::get('/', [AccountController::class,'index'])->name('account');
                    Route::get('/add', [AccountController::class,'add'])->name('account.add');
                    Route::post('/add', [AccountController::class,'postAdd']);
                    Route::get('/update/{id}', [AccountController::class,'update'])->name('account.update');
                    Route::post('/update', [AccountController::class,'postUpdate'])->name('account.postUpdate');
                });
                Route::get('/history', [HistoryController::class,'index'])->name('history');
                  
            });
        });
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

