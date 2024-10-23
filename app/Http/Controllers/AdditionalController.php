<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Skill;
use Illuminate\Http\Request;

class AdditionalController extends Controller
{
    public function index(){
        $title="Additional Fields";
        $skills=Skill::pluck('skill_name','id');
        $years=Year::pluck('year_name','id');
        return view('Form.Additional-field-form',compact('title','skills','years'));
    }
}
