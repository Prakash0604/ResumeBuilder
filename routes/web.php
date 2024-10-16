<?php

use App\Http\Controllers\SuperAdmin\AdminUserController;
use App\Http\Controllers\SuperAdmin\IndustryController;
use App\Http\Controllers\SuperAdmin\JobLevelController;
use App\Http\Controllers\SuperAdmin\DegreeController;
use App\Http\Controllers\SuperAdmin\FieldController;
use App\Http\Controllers\SuperAdmin\GradingController;
use App\Http\Controllers\SuperAdmin\GradingTypeController;
use App\Http\Controllers\SuperAdmin\SkillController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\YearController;
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


    // Route::get('/admin/register',[SuperAdminController::class,'index'])->name('admin.register');
    // Route::post('/admin/register',[SuperAdminController::class,'store']);
    // Route::get('/admin/login',[SuperAdminController::class,'login'])->name('admin.login');
    // Route::post('/admin/login',[SuperAdminController::class,'storeLogin']);

    Route::get('/admin/register',[SuperAdminController::class,'index'])->name('admin.register');
    Route::post('/admin/register',[SuperAdminController::class,'store']);
    Route::get('/admin/login',[SuperAdminController::class,'login'])->name('login');
    Route::post('/admin/login',[SuperAdminController::class,'storeLogin']);


Route::middleware('adminAuth')->group(function(){
    Route::prefix('admin')->group(function(){

        Route::get('user',[AdminUserController::class,'index'])->name('admin.users');

        // Industry
        Route::get('industry',[IndustryController::class,'index'])->name('admin.industry');
        Route::post('industry/store',[IndustryController::class,'storeIndustry']);
        Route::get('industry/get/{id}',[IndustryController::class,'getIndustry']);
        Route::post('industry/edit/{id}',[IndustryController::class,'updateIndustry']);
        Route::get('industry/delete/{id}',[IndustryController::class,'deleteIndustry']);


        // Job Level
        Route::get('job-level',[JobLevelController::class,'index'])->name('admin.job_level');
        Route::post('job-level/store',[JobLevelController::class,'storeJobLevel']);
        Route::get('job-level/get/{id}',[JobLevelController::class,'getJobLevel']);
        Route::post('job-level/edit/{id}',[JobLevelController::class,'updateJobLevel']);
        Route::get('job-level/delete/{id}',[JobLevelController::class,'deleteJobLevel']);

        // Degree
        Route::get('degree',[DegreeController::class,'index'])->name('admin.degree');
        Route::post('degree/store',[DegreeController::class,'storeDegree']);
        Route::get('degree/get/{id}',[DegreeController::class,'getDegree']);
        Route::post('degree/edit/{id}',[DegreeController::class,'updateDegree']);
        Route::get('degree/delete/{id}',[DegreeController::class,'deleteDegree']);

        // Field Of Study
        Route::get('field',[FieldController::class,'index'])->name('admin.field');
        Route::post('field/store',[FieldController::class,'storeField']);
        Route::get('field/get/{id}',[FieldController::class,'getField']);
        Route::post('field/edit/{id}',[FieldController::class,'updateField']);
        Route::get('field/delete/{id}',[FieldController::class,'deleteField']);

        // Grading Type
        Route::get('grading-type',[GradingTypeController::class,'index'])->name('admin.grading-type');
        Route::post('grading-type/store',[GradingTypeController::class,'storeGradingType']);
        Route::get('grading-type/get/{id}',[GradingTypeController::class,'getGradingType']);
        Route::post('grading-type/edit/{id}',[GradingTypeController::class,'updateGradingType']);
        Route::get('grading-type/delete/{id}',[GradingTypeController::class,'deleteGradingType']);


        // Skills
        Route::get('skill',[SkillController::class,'index'])->name('admin.skill');
        Route::post('skill/store',[SkillController::class,'storeSkill']);
        Route::get('skill/get/{id}',[SkillController::class,'getSkill']);
        Route::post('skill/edit/{id}',[SkillController::class,'updateSkill']);
        Route::get('skill/delete/{id}',[SkillController::class,'deleteSkill']);


        // Skills
        Route::get('grading',[GradingController::class,'index'])->name('admin.grading');
        Route::post('grading/store',[GradingController::class,'storeGrading']);
        Route::get('grading/get/{id}',[GradingController::class,'getGrading']);
        Route::post('grading/edit/{id}',[GradingController::class,'updateGrading']);
        Route::get('grading/delete/{id}',[GradingController::class,'deleteGrading']);


        // Skills
        Route::get('year',[YearController::class,'index'])->name('admin.year');
        Route::post('year/store',[YearController::class,'storeYear']);
        Route::get('year/get/{id}',[YearController::class,'getYear']);
        Route::post('year/edit/{id}',[YearController::class,'updateYear']);
        Route::get('year/delete/{id}',[YearController::class,'deleteYear']);







        Route::get('logout',[SuperAdminController::class,'adminLogout'])->name('admin.logout');
    });
});



Route::middleware('userAuth')->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('user',[AdminUserController::class,'index']);
    });
});
