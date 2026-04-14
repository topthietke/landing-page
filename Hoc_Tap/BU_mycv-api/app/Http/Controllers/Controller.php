<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function responseData($data, $code = null, $message = null){
        return response() -> json([
            'code' => '200',
            'message' => 'Success',
            'data' => $data ?? null,
            'version' => '2025.08'
        ]);
    }
}
