<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->bigInteger('created_by')->nullable()->default(NULL)->comment('ID của người dùng đã tạo bản ghi này, nullable nếu hệ thống tự tạo');
            $table->bigInteger('updated_by')->nullable()->default(NULL)->comment('ID của người dùng đã cập nhật bản ghi gần nhất, nullable nếu chưa có cập nhật');
            $table->bigInteger('deleted_by')->nullable()->default(NULL)->comment('ID của người dùng đã xóa bản ghi này, nullable nếu bản ghi chưa bị xóa');
            $table->timestamps(); // Tự động thêm created_at (thời điểm tạo) và updated_at (thời điểm cập nhật)
            $table->softDeletes(); // Thêm cột deleted_at để hỗ trợ xóa mềm, bản ghi không bị xóa khỏi DB mà chỉ đánh dấu thời điểm xóa

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};