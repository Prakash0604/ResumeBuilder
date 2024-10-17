<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable=['user_id','degree_id','field_id','institute','university','grading_type_id',
    'joined_year_id','passed_year_id','current_studying','created_by','updated_by'];

    protected $table='educations';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function degree(){
        return $this->belongsTo(Degree::class);
    }

    public function field(){
        return $this->belongsTo(Field::class);
    }

    public function gradingType(){
        return $this->belongsTo(GradingType::class);
    }

    public function joinYear(){
        return $this->belongsTo(Year::class,'joined_year_id','id');
    }
    public function passYear(){
        return $this->belongsTo(Year::class,'passed_year_id','id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }
     public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
