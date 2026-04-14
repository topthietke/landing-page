<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id()->comment('ID Kỹ năng');
            // Khóa ngoại
            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete()
                ->comment('ID của ứng viên sở hữu kỹ năng này');

            // Thông tin bắt buộc
            $table->string('name')
                ->comment('Tên kỹ năng (ví dụ: Laravel, Docker, Figma)');

            // Phân loại kỹ năng
            $table->string('category')
                ->default('other')
                ->comment('Phân loại: frontend, backend, database, devops, design, soft_skill, other');

            // Trình độ kỹ năng
            $table->string('level')
                ->default('beginner')
                ->comment('Trình độ: beginner, intermediate, advanced, expert');

            $table->bigInteger('created_by')->nullable()->default(NULL)->comment('Người tạo hồ sơ');
            $table->bigInteger('updated_by')->nullable()->default(NULL)->comment('Người cập nhật hồ sơ');
            $table->bigInteger('deleted_by')->nullable()->default(NULL)->comment('Người xóa hồ sơ');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
