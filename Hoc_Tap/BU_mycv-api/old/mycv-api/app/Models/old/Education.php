<?php

namespace App\Models;

use App\Models\Api\Candidate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CareerObjective extends BaseModel
{
    use HasFactory, SoftDeletes;
    protected $table = "educations";
    protected $fillable = [
        'id',
        'candidate_id',
        'institution',
        'course_name',
        'type',
        'start_date',
        'end_date',
        'technologies',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
