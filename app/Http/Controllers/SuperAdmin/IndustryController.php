<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndustryRequest;
use App\Models\Industry;
use App\Services\IndustryService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IndustryController extends Controller
{
    protected $model,$data;

    public function __construct(IndustryService $industryService,Industry $industry){
        $this->model=$industryService;
        $this->data=$industry;
    }
    public function index(Request $request){
        if($request->ajax()){
           $data= $this->data->all();
           return DataTables::of($data)
           ->addIndexColumn()
           ->addColumn('action',function($row){
            $btn='<a class="btn btn-warning editIndustry" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>';
            $btn .='<a  class="btn btn-danger deleteIndustry ml-2" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>';
            return $btn;
           })
           ->rawColumns(['action'])
           ->make(true);
        }
        return view('SuperAdmin.Page.Industry');
    }

    public function storeIndustry(IndustryRequest $request){
        try{
            // dd($request->all());
            // $this->model->store($request->all());
            foreach($request->industry_names as $index=>$industry){
                Industry::create([
                    'industry_name'=>$industry,
                    'description'=>$request->description[$index]
                ]);
            }
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function getIndustry($id){
        try{
            $data= $this->data->find($id);
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function updateIndustry(IndustryRequest $request,$id){
        try{
            $this->model->update($request->all(),$id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }
    public function deleteIndustry($id){
        try{
            $this->model->delete($id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }
}
