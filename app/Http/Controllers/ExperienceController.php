<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){

        }
        $title="Experience Information";
        return view('Form.Experience-form',compact('title'));
    }
}
