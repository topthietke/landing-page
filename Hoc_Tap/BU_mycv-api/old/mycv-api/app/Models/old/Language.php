<?php

namespace App\Models;

use App\Models\Api\Candidate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends BaseModel
{
    use HasFactory, SoftDeletes;
    protected $table = "languages";
    protected $fillable = [
        'id',
        'candidate_id',
        'lang_name',
        'content',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
