<?php

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
