<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Nội dung công việc trong từng dự án
        Schema::create('project_responsibilities', function (Blueprint $table) {
            $table->id()->comment('ID bản ghi công việc');
            // Khóa ngoại liên kết với bảng projects
            $table->foreignId('project_id')
                ->constrained()
                ->cascadeOnDelete()
                ->comment('ID của dự án mà trách nhiệm này thuộc về');

            // Nội dung chi tiết
            $table->text('content')
                ->comment('Mô tả chi tiết nhiệm vụ, module đã làm hoặc thành tựu trong dự án');

            $table->bigInteger('created_by')->nullable()->default(NULL)->comment('Người tạo hồ sơ');
            $table->bigInteger('updated_by')->nullable()->default(NULL)->comment('Người cập nhật hồ sơ');
            $table->bigInteger('deleted_by')->nullable()->default(NULL)->comment('Người xóa hồ sơ');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_responsibilities');
    }
};
