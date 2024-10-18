<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\JobLevel;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExperienceRequest;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ExperienceController extends Controller
{
    protected $experience;

    public function __construct(Experience $experience){
        $this->experience=$experience;
    }
    public function index(Request $request){
        if($request->ajax()){
            $data=$this->experience->all();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                return view('Button.button',compact('row'));
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $title="Experience Information";
        $data=[
            'industries'=>Industry::pluck('industry_name','id'),
            'jobLevels'=>JobLevel::pluck('job_level_name'),
        ];
        return view('Form.Experience-form',compact('title','data'));
    }

    public function store(ExperienceRequest $request){
        DB::beginTransaction();
        try{
            $request->validated();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            Log::error('Error Occured : ' + $e->getMessage());
            return back()->with(['error'=>'Something went wrong']);
        }
    }
}
