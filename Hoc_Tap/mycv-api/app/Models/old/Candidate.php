<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends BaseModel
{
    use SoftDeletes, HasFactory;    
    protected $table = "candidates";
    protected $fillable = [
        'id',
        'user_id',
        'full_name',
        'position',
        'gender',
        'status',
        'birthday',
        'phone',
        'email',
        'password',
        'github',
        'linkedin',
        'website',
        'skype',
        'avatar',
        'cv_file',
        'marital_status',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];  
}
