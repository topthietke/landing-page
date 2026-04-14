<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Services\Users\UsersInterface;
use App\Services\Users\UsersService;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    protected $usersInterface;
    public function __construct(UsersService $usersInterface){
        $this->usersInterface = $usersInterface;
    }
    public function login(LoginRequest $request) {
        $params = $request->all();
        return $this->usersInterface->login($params);
    }
    public function register(RegisterRequest $request) {
        $params = $request -> all();        
        return $this->usersInterface->register($params);
    }
    public function logout() {                
        return $this->usersInterface->logout();
    }
    public function forgotPassword(Request $request) {
        $params = $request->all();        
        return $this->usersInterface->forgotPassword($params);
    }
    public function change_password(Request $request) {
        $params = $request->all();        
        return $this->usersInterface->forgotPassword($params);
    }
}
