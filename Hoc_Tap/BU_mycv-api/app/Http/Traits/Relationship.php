<?php

namespace App\Http\Traits;

use App\Models\Api\Candidate;
use App\Models\Api\User;

trait BackendApiTraits
{
    function creator(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    function updator(){
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
    function deletor(){
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
    function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
}

