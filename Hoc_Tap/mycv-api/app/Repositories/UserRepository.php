<?php

namespace App\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class UserRepository
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($fields)
    {
        $user = $this->user->where('email', $fields['email'])->first();        
        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return null;
        }
        return $user;
    }
    public function Register($params) {
        $dem = $this->user->where('email', $params['email'])->count();
        $user = null;
        if($dem > 0) {
            return [
                "code"  => Response::HTTP_BAD_REQUEST,
                "message" => "Email đã tồn tại",
            ];             
        }
        $user = User::create([            
            'email' => $params['email'],
            'password' => Hash::make($params['password'])
        ]);        
        return $user;
    }
    
    public function forgotPassword($params)
    {
        $user = $this->user->where('email', $params['email'])->first();        
        if (!$user) {
            return [
                "code"  => Response::HTTP_BAD_REQUEST,
                "message" => "Email không tồn tại",
            ];
        }

        try {
            $newPassword = Str::random(10);
            $user->password = Hash::make($newPassword);
            $user->save();

            Mail::raw("Mật khẩu mới của bạn là: {$newPassword}", function ($message) use ($user) {
                $message->to($user->email)->subject('Cấp lại mật khẩu mới');
            });

            return [
                "code"    => Response::HTTP_OK,
                "message" => "Mật khẩu mới đã được gửi về email của bạn",
            ];
        } catch (\Exception $e) {
            return [
                "code"    => Response::HTTP_BAD_REQUEST,
                "message" => "Lỗi: " . $e->getMessage(),
            ];
        }
    }
}
