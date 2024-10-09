<?php

use App\Http\Controllers\SuperAdmin\AdminUserController;
use App\Http\Controllers\SuperAdmin\IndustryController;
use App\Http\Controllers\SuperAdmin\JobLevelController;
use App\Http\Controllers\SuperAdmin\DegreeController;
use App\Http\Controllers\SuperAdmin\FieldController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
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

        // Industry
        Route::get('industry',[IndustryController::class,'index'])->name('admin.industry');
        Route::post('industry/store',[IndustryController::class,'storeIndustry']);
        Route::get('industry/delete/{id}',[IndustryController::class,'deleteIndustry']);
        Route::get('industry/get/{id}',[IndustryController::class,'getIndustry']);
        Route::post('industry/edit/{id}',[IndustryController::class,'updateIndustry']);


        // Job Level
        Route::get('job-level',[JobLevelController::class,'index'])->name('admin.job_level');
        Route::post('job-level/store',[JobLevelController::class,'storeJobLevel']);
        Route::get('job-level/delete/{id}',[JobLevelController::class,'deleteJobLevel']);
        Route::get('job-level/get/{id}',[JobLevelController::class,'getJobLevel']);
        Route::post('job-level/edit/{id}',[JobLevelController::class,'updateJobLevel']);

        // Degree
        Route::get('degree',[DegreeController::class,'index'])->name('admin.degree');
        Route::post('degree/store',[DegreeController::class,'storeDegree']);
        Route::get('degree/delete/{id}',[DegreeController::class,'deleteDegree']);
        Route::get('degree/get/{id}',[DegreeController::class,'getDegree']);
        Route::post('degree/edit/{id}',[DegreeController::class,'updateDegree']);

        // Field Of Study
        Route::get('field',[FieldController::class,'index'])->name('admin.field');
        Route::post('field/store',[FieldController::class,'storeField']);
        Route::get('field/delete/{id}',[FieldController::class,'deleteField']);
        Route::get('field/get/{id}',[FieldController::class,'getField']);
        Route::post('field/edit/{id}',[FieldController::class,'updateField']);






        Route::get('logout',[AdminUserController::class,'adminLogout'])->name('admin.logout');
    });
});



Route::middleware('userAuth')->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('user',[AdminUserController::class,'index']);
    });
});
