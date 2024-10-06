<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuperAdminRequest;
use App\Services\SuperAdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SuperAdminController extends Controller
{

    protected $modal;
    public function __construct(SuperAdminService $superAdminService){
        $this->modal=$superAdminService;
    }
    public function index(){
        return view('SuperAdmin.Auth.register');
    }

    public function store(SuperAdminRequest $request){
        try{
            $data=$request->validated();
            $data['position']="Admin";
            $this->modal->storeUser($data);
            return redirect()->back()->with(['message'=>'User has been created']);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function login(){
        return view('SuperAdmin.Auth.login');
    }

    public function storeLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:3',
        ],
        [
            'email.required'=>'Please Enter your email',
            'email.email'=>'Email must be a type of mail format',
            'password.required'=>'Please Enter your password',
            'password.min'=>'Password Should be at least of 3 character',
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if(Auth::user()->position == "admin"){
                Session::put(['email'=>$request->email]);
                return redirect('/admin/users');
            }else{
                Session::put(['email'=>$request->email]);
                return redirect('/sidebar');
            }
        }else{
            return back()->with(['message'=>'Invalid email or password']);
        }
    }
}
