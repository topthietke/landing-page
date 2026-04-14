<?php

namespace App\Repositories;

use App\Http\Traits\BackendApiTraits;
use App\Models\User;

class userRepository
{    
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}