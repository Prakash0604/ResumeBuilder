<?php

namespace App\Http\Controllers;

use App\Http\Requests\YearRequest;
use App\Models\Year;
use App\Services\YearService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class YearController extends Controller
{
    protected $data,$modal;
    public function __construct(Year $year,YearService $yearService){
        $this->data=$year;
        $this->modal=$yearService;
    }
    public function index(Request $request){
        $title="Year";
        if($request->ajax()){
            $year=$this->data->latest()->get();
            return DataTables::of($year)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                // $data=$row->id;
                $btn='<button class="btn btn-warning mr-2 editButton" type="button" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>';
                $btn .='<button class="btn btn-danger deleteButton" type="button" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>';
                return $btn;
                // return view('Button.button',compact('row'));
            })
            ->rawColumns(['action'])
            ->make(true);

        }
        return view('SuperAdmin.Page.Year',compact('title'));
    }

    public function storeYear(YearRequest $request){
        try{
            foreach($request->year_names as $index=>$year){
                $this->data->create([
                    'year_name'=>$year,
                    'description'=>$request->descriptions[$index],
                ]);
            }
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function getYear($id){
        try{
            $data=$this->modal->getData($id);
            return response()->json(['success'=>true,'message'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }

    public function updateYear(Request $request,$id){
        try{
            $this->modal->updateData($request->all(),$id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }


    public function deleteYear($id){
        try{
            $this->modal->deleteData($id);
            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }


}
