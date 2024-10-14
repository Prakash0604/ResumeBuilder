<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use App\Services\SkillService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SkillController extends Controller
{

    protected $data,$model;
    public function __construct(Skill $skill, SkillService $skillService){
        $this->data=$skill;
        $this->model=$skillService;
    }
    public function index(Request $request)
    {
        $title = "Skill";
        if($request->ajax()){
            $skills=$this->data->all();
            return DataTables::of($skills)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<button type="button" class="btn btn-warning editSkill mr-2" data-id="'.$row->id.'"  data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>';
                $btn .='<button class="btn btn-danger deleteSkill" data-id="'.$row->id.'"  data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('SuperAdmin.Page.Skill', compact('title'));
    }

    public function storeSkill(SkillRequest $request){
        try{
            // dd($request->all());
            foreach($request->skill_names as $index=>$skill){
               $data= $this->data->create([
                    'skill_name'=>$skill,
                    'description'=>$request->descriptions[$index],
                ]);
            }
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'lines'=>$e->getLine()]);
        }
    }

    public function getSkill($id){
        try{
            $data=$this->model->findData($id);
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function updateSkill(SkillRequest $request,$id){
        try{
            $this->model->updateData($request->all(),$id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getMessage()]);
        }
    }

    public function deleteSkill($id){
        try{
            $this->model->deleteData($id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'messag'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }
}
