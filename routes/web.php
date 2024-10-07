<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sidebar',function(){
    return view('Form/personal-detail-form');
});

Route::get('/education',function(){
    return view('Form/Education-form');
});
Route::get('/experience',function(){
    return view('Form/Experience-form');
});

Route::get('/others',function(){
    return view('Form/Additional-field-form');
});


    Route::get('/admin/register',[SuperAdminController::class,'index'])->name('admin.register');
    Route::post('/admin/register',[SuperAdminController::class,'store']);
    Route::get('/admin/login',[SuperAdminController::class,'login'])->name('admin.login');
    Route::post('/admin/login',[SuperAdminController::class,'storeLogin']);


Route::middleware('adminAuth')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('user',[AdminUserController::class,'index'])->name('admin.users');
        Route::get('industry',[IndustryController::class,'index'])->name('admin.industry');
        Route::post('industry/store',[IndustryController::class,'storeIndustry']);
        Route::get('logout',[AdminUserController::class,'adminLogout'])->name('admin.logout');
    });
});



Route::middleware('userAuth')->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('user',[AdminUserController::class,'index']);
    });
});
