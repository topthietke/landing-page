<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends BaseModel
{
    use HasFactory, SoftDeletes;
    protected $table = "provinces";
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
