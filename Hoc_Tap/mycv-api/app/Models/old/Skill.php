<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends BaseModel
{
    use HasFactory, SoftDeletes;
    protected $table = "skills";
    protected $fillable = [
        'id',
        'candidate_id',
        'name',
        'category',
        'level',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
