<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PersonalInformationRequest;

class PersonalDetailController extends Controller
{
    protected $modal;
    public function __construct()
    {
        $this->modal = Auth::user();
    }
    public function index()
    {
        $title="Personal Detail Information";
        $user = Auth::user();
        return view('Form.personal-detail-form', compact('user','title'));
    }

    public function update(PersonalInformationRequest $request)
    {
        DB::beginTransaction();
        try{
        // dd($request->all());
        $user = Auth::user();

        $folder = 'images/' . $user->id;

        if($request->hasFile('image')){

            // Delete the previous images
            if($user->profile){
                Storage::disk('public')->delete($user->profile);
            }

           $imagename=Str::random(5).'.'.$request->image->extension();
           $path=$request->image->storeAs($folder,$imagename,'public');
           $user->profile=$path;
        }

        // $user->first_name=$request->first_name;
        // $user->middle_name=$request->middle_name;
        // $user->last_name=$request->last_name;
        // $user->email=$request->email;
        // $user->address=$request->address;
        // $user->contact=$request->contact;
        // $user->dob=$request->dob;
        // $user->gender=$request->gender;
        // $user->summary=$request->summary;
        // $user->save();
        $user->update($request->only(['first_name','middle_name','last_name','email','address','dob','gender','summary']));
        DB::commit();
        // $user->update($request->all());
        return back()->with(['success'=>'Personal Detail has been Updated']);
    }catch(\Exception $e){
        DB::rollBack();
        Log::error('Failed to insert data :'.$e->getMessage());
        return back()->with(['error'=>'Something went wrong please try again later']);
    }
    }
}
