<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradingType extends Model
{
    use HasFactory;
    protected $fillable=['grading_type','description','status'];
}
