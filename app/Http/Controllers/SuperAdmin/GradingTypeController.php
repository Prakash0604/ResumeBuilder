<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradingTypeRequest;
use App\Models\GradingType;
use App\Services\GradingTypeService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GradingTypeController extends Controller
{
    protected $data,$model;

    public function __construct(GradingType $gradingType,GradingTypeService $gradingTypeService){
        $this->data=$gradingType;
        $this->model=$gradingTypeService;
    }

    public function index(Request $request){
        $title="Grading Types";
        if($request->ajax()){
            $grading=$this->data->all();
            return DataTables::of($grading)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<button type="button" class="btn btn-warning mr-2 editGradingType" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>';
                $btn .='<button type="button" class="btn btn-danger deleteGradingType" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('SuperAdmin.Page.GradingType',compact('title'));
    }

    public function storeGradingType(GradingTypeRequest $request){
        try{
            foreach($request->grading_types as $index=>$grading){
                $this->data->create([
                    'grading_type'=>$grading,
                    'description'=>$request->descriptions[$index]
                ]);
            }
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'lines'=>$e->getLine()]);
        }
    }

    public function getGradingType($id){
        try{
            $data=$this->model->getData($id);
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function updateGradingType(GradingTypeRequest $request,$id){
        try{
            $this->model->updateData($request->all(),$id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'lines'=>$e->getLine()]);
        }
    }

    public function deleteGradingType($id){
        try{
            $this->model->deleteData($id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }
}
