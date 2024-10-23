<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\JobLevel;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExperienceRequest;
use App\Services\ExperienceService;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ExperienceController extends Controller
{
    protected $experience,$model;

    public function __construct(Experience $experience,ExperienceService $experienceService){
        $this->experience=$experience;
        $this->model=$experienceService;
    }
    public function index(Request $request){
        if($request->ajax()){
            $data=$this->experience->all();
            return DataTables::of($data)
            ->addIndexColumn()
            // ->addColumn('position',function($row){
            //    return $row->position->position_name ?? "N/A";
            // })
            // ->addColumn('organization',function($row){
            //     return $row->organization->organization_name ?? "N/A";
            // })
            ->addColumn('action',function($row){
                return view('Button.button',compact('row'));
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $title="Experience Information";
        $data=[
            'industries'=>Industry::pluck('industry_name','id'),
            'jobLevels'=>JobLevel::pluck('job_level_name','id'),
        ];
        return view('Form.Experience-form',compact('title','data'));
    }

    public function store(ExperienceRequest $request){
        DB::beginTransaction();
        try{
            // dd($request->all());
            $data=$request->validated();
            $data['user_id']= Auth::id();
            $data['created_by']=Auth::id();
            $this->model->storeData($data);
            DB::commit();
            return back()->with(['success'=>'Experience Created Successfully']);
        }catch(\Exception $e){
            DB::rollBack();
            Log::error('Error Occured : '. $e->getMessage());
            return back()->with(['message'=>'Something went wrong','error'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function getExperience($id){
        try{
            $data=$this->model->getIndividualData($id);
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function updateExperience(ExperienceRequest $request,$id){
        DB::beginTransaction();
        try{
            $this->model->updateData($request->validated(),$id);
            DB::commit();
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            // Log::error('message'.$e->getMessage());
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function experienceDetail($id){
        try{
            $data=$this->model->getDataDetail($id);
            DB::commit();
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            // Log::error('message'.$e->getMessage());
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }

    }

    public function destoryExperience($id){
        DB::beginTransaction();
        try{
            $this->model->deleteData($id);
            DB::commit();
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }
}
