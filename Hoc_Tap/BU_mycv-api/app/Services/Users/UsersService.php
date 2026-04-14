<?php

namespace App\Services\Users;

use App\Repositories\UserRepository;
use App\Repositories\UsersRepository;
use App\Services\Users\UsersInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserService
 *
 * @package App\Services
 */
class UsersService implements UsersInterface
{
     protected $userRepository;

     public function __construct(UserRepository $userRepository)
     {
          $this->userRepository = $userRepository;         
     }     
    
     public function login($params)
     {
          // Check email
          $user = $this->userRepository->login($params);
          if (!empty($user)) {
               $token = $user->createToken('auth_token')->plainTextToken;  // Trường hợp báo lỗi hàm này thì phải có HasApiTokens trong model  User   
               $data = [
                    "code"    => Response::HTTP_OK,
                    "message" => "Đăng nhập thành công",
                    "data"    => [
                         'user'  => $user,
                         'token' => $token
                    ]
               ];      
          } else {
               $data = [
                    "code"  => Response::HTTP_BAD_REQUEST,
                    "message" => "Email hoặc Mật khẩu không đúng",
                    "data"  => null
               ];
          }          
         
          return $data;
     }


     public function register($params) {
          $user = $this->userRepository->register($params);                   
          if (!empty($user) && $user['code'] == Response::HTTP_OK) {     
               $token = $user->createToken('auth_token')->plainTextToken;  // Trường hợp báo lỗi hàm này thì phải có HasApiTokens trong model  User   
               $data = [
                    "code"    => Response::HTTP_OK,
                    "message" => "Đăng ký thành công",
                    "data"    => [
                         'user'  => $user,
                         'token' => $token
                    ]
               ];      
          } else {              
               $data = [
                    "code"  => Response::HTTP_BAD_REQUEST,
                    "message" => !empty($user['message']) ? $user['message'] : "Đăng ký thất bại" ,                    
               ];
          }          
         
          return $data;
     }
     public function logout() {
          if (auth()->check()) {
               auth()->user()->currentAccessToken()->delete();
               return [
                    "code"    => Response::HTTP_OK,
                    "message" => "Đăng xuất thành công",
               ];
          }
          return [
               "code"    => Response::HTTP_UNAUTHORIZED,
               "message" => "Bạn chưa đăng nhập",
          ];
     }

     public function forgotPassword($params) {
          return $this->userRepository->forgotPassword($params);
     }
}
