<?php

namespace App\Models\Api;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activities extends BaseModel
{
    use SoftDeletes, HasFactory;    
    protected $table = "activities";
    protected $fillable = [
        'id',
        'candidate_id',
        'organization',
        'role',
        'description',
        'start_date',
        'end_date',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];  
}
