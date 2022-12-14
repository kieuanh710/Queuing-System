<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\ForgotPasswordController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\BoardCastController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\CheckIP;


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
Route::post('/forgotpassword', [ForgotPasswordController::class,'password'])->name('forgotpasswordPost');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'sendResetEmail'])->name('sendResetEmail');
Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('resetPassword');

Route::get('/password/reset/{token}', [LoginController::class,'getpass'])->name('reset');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    // Route::resource('/boardcast', BoardCastController::class);
    Route::prefix('/admin')->group(function(){
        Route::get('/dashboard', [ManageController::class,'index'])->name('admin');
        Route::get('/dashboard/week', [ManageController::class,'week'])->name('week');
        Route::get('/dashboard/month', [ManageController::class,'month'])->name('month');
        Route::get('/notify', [BoardCastController::class,'notify'])->name('notify');
        
        Route::prefix('/manage')->group(function(){
            // Route::get('/chart', [ManageController::class,'getAllMonth']);

            Route::prefix('/device')->group(function(){
                Route::get('/', [DeviceController::class,'index'])->name('device');
                Route::get('/add', [DeviceController::class,'add'])->name('device.add');
                Route::post('/add', [DeviceController::class,'postAdd']);
                Route::get('/update/{id}', [DeviceController::class,'update'])->name('device.update');
                Route::post('/update', [DeviceController::class,'postUpdate'])->name('device.postUpdate');
                Route::get('/detail', [DeviceController::class,'detail'])->name('device.detail');
                Route::get('/detail/filter', [DeviceController::class,'getUsers'])->name('filterSearchDevice');

            });
            
            Route::prefix('/service')->group(function(){
                Route::get('/', [ServiceController::class,'index'])->name('service');
                Route::get('/add', [ServiceController::class,'add'])->name('service.add');
                Route::post('/add', [ServiceController::class,'postAdd']);
                Route::get('/update/{id}', [ServiceController::class,'update'])->name('service.update');
                Route::post('/update', [ServiceController::class,'postUpdate'])->name('service.postUpdate');
                Route::get('/detail', [ServiceController::class,'detail'])->name('service.detail');

                Route::get('/detail/filter', [ServiceController::class,'getUsers'])->name('filterSearchService');
                Route::get('/detail/filter/BC', [BoardCastController::class,'getBoardCast'])->name('filterGetBC');
            });

            Route::prefix('/boardcast')->group(function(){
                Route::get('/', [BoardCastController::class,'index'])->name('boardcast');
                Route::get('/add', [BoardCastController::class,'add'])->name('boardcast.add');
                Route::post('/add', [BoardCastController::class,'postAdd'])->name('boardcast.postAdd');
    
                Route::get('/detail', [BoardCastController::class,'detail'])->name('boardcast.detail');
                Route::get('/detail/filter', [BoardCastController::class,'getUsers'])->name('filterSearchBoardCast');
                Route::get('/add/number',[BoardCastController::class,'postAdd'])->name('popup');
            });
           

            Route::prefix('/report')->group(function(){
                Route::get('/', [ReportController::class,'index'])->name('report');
                Route::get('/export', [ReportController::class, 'export'])->name('export');
                Route::get('/detail/filter', [ReportController::class,'getUsers'])->name('filterSearchReport');

            });
            Route::prefix('/system')->group(function(){
                Route::prefix('/role')->group(function(){
                    Route::get('/', [RoleController::class,'index'])->name('role');
                    Route::get('/add', [RoleController::class,'add'])->name('role.add');
                    Route::post('/add', [RoleController::class,'postAdd']);
                    Route::get('/update/{id}', [RoleController::class,'update'])->name('role.update');
                    Route::post('/update', [RoleController::class,'postUpdate'])->name('role.postUpdate');
                    Route::get('/detail/filter', [RoleController::class,'getUsers'])->name('filterSearchRole');

                });
                Route::prefix('/account')->group(function(){
                    Route::get('/', [AccountController::class,'index'])->name('account');
                    Route::get('/add', [AccountController::class,'add'])->name('account.add');
                    Route::post('/add', [AccountController::class,'postAdd']);
                    Route::get('/update/{id}', [AccountController::class,'update'])->name('account.update');
                    Route::post('/update', [AccountController::class,'postUpdate'])->name('account.postUpdate');
                    Route::get('/detail/filter', [AccountController::class,'getUsers'])->name('filterSearchAccount');
                    Route::get('/info', [AccountController::class,'info'])->name('info');
                    Route::post('/upload', [AccountController::class,'upload'])->name('update');
                });
                Route::get('/history', [HistoryController::class,'index'])->name('history');
                Route::get('/detail/filter', [HistoryController::class,'getUsers'])->name('filterSearchHistory');
                  
            });
        });
    });

});



