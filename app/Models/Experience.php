<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable=['user_id','position','organization_name','roles_responsibility','industry_id','job_level_id','starting_date','ending_date','status','created_by','updated_by'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function industry(){
        return $this->belongsTo(Industry::class);
    }

    public function jobLevel(){
        return $this->belongsTo(JobLevel::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
