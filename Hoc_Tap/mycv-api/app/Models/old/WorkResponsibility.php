<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkResponsibility extends BaseModel
{
    use HasFactory, SoftDeletes;
    protected $table = "work_responsibilities";
    protected $fillable = [
        'id',
        'work_experience_id',
        'content',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
