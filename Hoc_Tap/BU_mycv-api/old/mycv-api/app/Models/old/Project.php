<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends BaseModel
{
    use HasFactory, SoftDeletes;
    protected $table = "projects";
    protected $fillable = [
        'id',
        'candidate_id',
        'name',
        'role',
        'team_size',
        'client',
        'technologies',
        'description',
        'url',
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
