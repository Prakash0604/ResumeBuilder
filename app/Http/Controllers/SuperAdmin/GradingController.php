<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradingRequest;
use App\Models\Grading;
use App\Services\GradingService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GradingController extends Controller
{
    protected $data,$modal;
    public function __construct(Grading $grading,GradingService $gradingService){
        $this->data=$grading;
        $this->modal=$gradingService;
    }
    public function index(Request $request){
        $title="Grading";
        if($request->ajax()){
            $grading=$this->data->all();
            return DataTables::of($grading)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn="<button class='btn btn-warning mr-2 editGrading' type='button' data-id='".$row->id."' data-bs-toggle='modal' data-bs-target='#editModal'>Edit</button>";
                $btn .="<button class='btn btn-danger deleteGrading' type='button' data-id='".$row->id."' data-bs-toggle='modal' data-bs-target='#deleteModal'>Delete</button>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('SuperAdmin.Page.Grading',compact('title'));
    }

    public function storeGrading(GradingRequest $request){
        try{
            foreach($request->grading_names as $index=>$grading){
                $this->data->create([
                    'grading_name'=>$grading,
                    'description'=>$request->descriptions[$index]
                ]);
            }
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function getGrading($id){
        try{
            $data=$this->modal->findData($id);
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function updateGrading(Request $request,$id){
        try{
           $data= $this->modal->editData($request->all(),$id);
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function deleteGrading($id){
        try{
            $this->modal->deleteData($id);
            return response()->json(['success'=>true]);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }
}
