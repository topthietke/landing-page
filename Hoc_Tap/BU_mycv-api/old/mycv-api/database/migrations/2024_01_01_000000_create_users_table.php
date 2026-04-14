<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Bảng users tạo TRƯỚC candidates
        // Lưu thông tin tài khoản đăng nhập hệ thống
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('ID người dùng');
            // Thông tin đăng nhập
            $table->string('email')->unique()->comment('Địa chỉ email');
            $table->string('password')->comment('Mật khẩu đăng nhập');
            $table->bigInteger('roles_id')->nullable()->default(1)->comment('ID vai trò người dùng');
            $table->boolean('is_active')->nullable()->default(true)->comment('Trạng thái hoạt động');
            $table->rememberToken();            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
