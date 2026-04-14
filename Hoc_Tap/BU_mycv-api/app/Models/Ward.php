<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ward extends BaseModel
{
    use HasFactory, SoftDeletes;
    protected $table = "wards";
    protected $fillable = [
        'id',
        'code',
        'name',
        'division_type',
        'codename',
        'province_code',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
