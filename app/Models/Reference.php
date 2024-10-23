<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;
    protected $fillable=['user_id','reference_person','position','email','company_name'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
