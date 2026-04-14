<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectResponsibility extends BaseModel
{
    use HasFactory, SoftDeletes;
    protected $table = "project_responsibilities";
    protected $fillable = [
        'id',
        'project_id',
        'content',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',

    ];
}
