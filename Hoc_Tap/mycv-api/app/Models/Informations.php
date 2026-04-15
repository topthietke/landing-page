<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    use HasFactory;    
    protected $table = 'informationss';
    protected $fillable = [
        'name',
        'title',
        'dob',
        'phone',
        'email',
        'address',
        'avatar',
        'objective'
    ];
}
