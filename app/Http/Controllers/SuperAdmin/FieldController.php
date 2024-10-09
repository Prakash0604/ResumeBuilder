<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FieldStudyRequest;
use App\Models\Field;
use App\Services\FieldService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FieldController extends Controller
{
    protected $data,$modal;
    public function __construct(protected Field $field, FieldService $fieldService){
        $this->data=$field;
        $this->modal=$fieldService;
    }
    public function index(Request $request){
      if($request->ajax()){
        $field=$this->data->all();
        return DataTables::of($field)
        ->addIndexColumn()
        ->addColumn('action',function($row){
            $btn='<button class="btn btn-warning editField mr-2" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>';
            $btn .="<button class='btn btn-danger deleteField' data-id='".$row->id."' data-bs-toggle='modal' data-bs-target='#deleteModal'>Delete</button>";
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
      }
        return view('SuperAdmin.Page.FieldofStudy');
    }

    public function storeField(FieldStudyRequest $request){
        try{
            foreach ($request->field_names as $index => $field) {
                Field::create([
                    'field_name'=>$field,
                    'description'=>$request->descriptions[$index]
                ]);
            }
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function getField($id){
        try{
            $data=$this->modal->edit($id);
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function updateField(FieldStudyRequest $request,$id){
        try{
            $this->modal->update($request->all(),$id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function deleteField($id){
        try{
            $this->modal->delete($id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }
}
