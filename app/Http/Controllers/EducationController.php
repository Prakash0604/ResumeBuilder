<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Field;
use App\Models\Degree;
use App\Models\Education;
use App\Models\GradingType;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Request;
use App\Http\Requests\EducationRequest;
use App\Services\EducationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Utilities\Request;
use Yajra\DataTables\Facades\DataTables;

class EducationController extends Controller
{
    protected $modal,$education;
    public function __construct(Education $education,EducationService $educationService)
    {
        $this->modal = $education;
        $this->education=$educationService;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $education = $this->modal->all();
            return DataTables::of($education)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('Button.button', compact('row'));
                })
                ->addColumn('degree',function($row){
                    return $row->degree->degree_name ?? 'N/A';
                })
                ->addColumn('field_of_study',function($row){
                    return $row->field->field_name ?? 'N/A';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $user = auth()->user();
        $title = "Education Information";
        $data = [
            'degrees' => Degree::pluck('id', 'degree_name'),
            'field_of_studies' => Field::pluck('id', 'field_name'),
            'grading_types' => GradingType::pluck('id', 'grading_type'),
            'years' => Year::pluck('id', 'year_name'),
        ];

        return view('Form.Education-form', compact('title', 'user', 'data'));
    }

    public function store(EducationRequest $request){
        DB::beginTransaction();
        try{
            $data=$request->validated();
            $data['user_id']= Auth::id();
            $data['created_by']=Auth::id();
            $this->education->storeData($data);
            DB::commit();
            return back()->with(['success'=>'Education Created Successfully']);
        }catch(\Exception $e){
            DB::rollBack();
            Log::error('Error Occur : ' + $e->getMessage());
            return back()->with(['error'=>'Something went wrong']);
           }
        }

        public function getEducation($id){
            try{
                $data=$this->education->viewDetail($id);
                return response()->json(['success'=>true,'message'=>$data]);
            }catch(\Exception $e){
                // Log::error('Data not fetched : ', $e->getMessage());
                return response()->json(['success'=>false,'message'=>$e->getMessage(),'lines'=>$e->getLine()]);
            }
        }

        public function updateEducation(EducationRequest $request,$id){
            DB::beginTransaction();
            try{
                $data=$request->validated();
                $data['updated_by']=Auth::id();
                $this->education->updateData($data,$id);
                DB::commit();
                return response()->json(['success'=>true]);
            }catch(\Exception $e){
                DB::rollBack();
                return response()->json(['success'=>false,'message'=>$e->getMessage(),'line'=>$e->getLine()]);
            }
        }
    }
