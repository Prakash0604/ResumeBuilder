<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndustryRequest;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index(){
        return view('SuperAdmin.Page.Industry');
    }

    public function storeIndustry(Request $request){
        try{
            dd($request->all());
            $request->validated();
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }
}
