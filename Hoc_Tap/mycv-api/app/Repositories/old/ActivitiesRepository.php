<?php

namespace App\Repositories;
use App\Models\Api\Activities;

class ActivitiesRepository extends BaseRepository
{
    public function __construct(Activities $model) {        
        $this->model = $model;
    }
}