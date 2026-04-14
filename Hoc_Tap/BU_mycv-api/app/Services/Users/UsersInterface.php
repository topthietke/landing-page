<?php 

namespace App\Services\Users;
use Illuminate\Http\Request;
interface UsersInterface
{    
    public function Login($params);
    public function Register($params);
    public function Logout();
    public function forgotPassword($params);
}