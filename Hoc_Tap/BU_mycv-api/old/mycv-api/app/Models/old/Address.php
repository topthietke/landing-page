<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends BaseModel
{
    use SoftDeletes, HasFactory;    
    protected $table = "address";
    protected $fillable = [
        'id',
        'candidate_id',
        'provinces_id',
        'wards_id',
        'adress',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];  

}
