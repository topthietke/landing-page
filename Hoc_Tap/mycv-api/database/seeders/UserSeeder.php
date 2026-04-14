<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'id'             => 1,
                'email'          => 'admin@gmail.com',
                'password'       => Hash::make('password'),
                'roles_id'       => 1,
                'is_active'      => 1,
                'remember_token' => Str::random(60),
                'created_at'     => now(),
                'updated_at'     => now(),
                'deleted_at'     => null,
            ]            
        ];

        DB::table('users')->insert($users);
    }
}