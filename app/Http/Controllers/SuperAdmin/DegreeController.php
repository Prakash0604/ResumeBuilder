<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DegreeRequest;
use App\Models\Degree;
use App\Services\DegreeService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DegreeController extends Controller
{
    protected $data,$modal;

    public function __construct(DegreeService $degreeService,Degree $degree)
    {
        $this->data = $degree;
        $this->modal=$degreeService;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->data->all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<button class="btn btn-primary editDegree mr-2" type="button" data-bs-toggle="modal" data-id="'.$row->id.'" data-bs-target="#editModal">Edit</button>';
                    $btn .= '<button class="btn btn-danger deleteDegree" type="button" data-bs-toggle="modal" data-id="'.$row->id.'" data-bs-target="#deleteModal">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('SuperAdmin.Page.Degree');
    }

    public function storeDegree(DegreeRequest $request)
    {
        // dd($request->all());
        try {
            foreach ($request->degree_names as $index => $degree) {
                Degree::create([
                    'degree_name' => $degree,
                    'description' => $request->descriptions[$index]
                ]);
            }
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function getDegree($id){
        try{
            $data=$this->data->find($id);
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function updateDegree(DegreeRequest $request,$id){
        try{
            $this->modal->edit($request->all(),$id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function deleteDegree($id){
        try{
            $this->modal->delete($id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }


}
