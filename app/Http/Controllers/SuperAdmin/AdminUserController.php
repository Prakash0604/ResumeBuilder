<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
{
    public function index(Request $request){
        $title="Users";
        if($request->ajax()){
            $users=User::all();
            // except(['position','admin'])->get()
            return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn='<a class="btn btn-warning " data-id="'.$row->id.'">View Portfolio</a>';
                // $btn='<button class="btn btn-primary editItem" data-id="'.$row->id.'">Edit</button>';
                // $btn .='<button class="btn btn-danger deleteItem ml-2" data-id="'.$row->id.'">Delete</button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('SuperAdmin.Page.User',compact('title') );
    }
}
