<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobLevelRequest;
use App\Models\JobLevel;
use Illuminate\Http\Request;
use App\Services\JobLevelService;
use Yajra\DataTables\Facades\DataTables;

class JobLevelController extends Controller
{
    protected $model,$data;

    public function __construct(JobLevelService $jobLevelService,JobLevel $jobLevel){
        $this->model=$jobLevelService;
        $this->data=$jobLevel;
    }
    public function index(Request $request){
        if($request->ajax()){
           $data= $this->data->all();
           return DataTables::of($data)
           ->addIndexColumn()
           ->addColumn('action',function($row){
            $btn='<a class="btn btn-warning editJobLevel" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>';
            $btn .='<a  class="btn btn-danger deleteJobLevel ml-2" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>';
            return $btn;
           })
           ->rawColumns(['action'])
           ->make(true);
        }
        return view('SuperAdmin.Page.JobLevel');
    }

    public function storeJobLevel(JobLevelRequest $request){
        try{
            // dd($request->all());
            // $this->model->store($request->all());
            foreach($request->job_level_names as $index=>$job){
                JobLevel::create([
                    'job_level_name'=>$job,
                    'description'=>$request->description[$index]
                ]);
            }
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function getJobLevel($id){
        try{
            $data= $this->data->find($id);
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function updateJobLevel(JobLevelRequest $request,$id){
        try{
            $this->model->update($request->all(),$id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }
    public function deleteJobLevel($id){
        try{
            $this->model->delete($id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }
}
