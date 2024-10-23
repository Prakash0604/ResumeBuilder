<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable=['user_id','title','year_id','institution'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function year(){
        return $this->belongsTo(Year::class,'year_id','id');
    }
}
