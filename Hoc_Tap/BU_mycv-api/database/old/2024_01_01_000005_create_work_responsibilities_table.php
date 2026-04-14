<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Nhiệm vụ / công việc cụ thể trong từng kinh nghiệm
        Schema::create('work_responsibilities', function (Blueprint $table) {
            $table->id()->comment('ID bản ghi công việc');
            // Khóa ngoại liên kết với bảng work_experiences
            $table->foreignId('work_experience_id')
                ->constrained()
                ->cascadeOnDelete()
                ->comment('ID của bản ghi kinh nghiệm làm việc tương ứng');

            // Nội dung chi tiết
            $table->text('content')
                ->comment('Mô tả chi tiết một đầu mục công việc hoặc thành tựu (Bullet point)');

            $table->bigInteger('created_by')->nullable()->default(NULL)->comment('Người tạo hồ sơ');
            $table->bigInteger('updated_by')->nullable()->default(NULL)->comment('Người cập nhật hồ sơ');
            $table->bigInteger('deleted_by')->nullable()->default(NULL)->comment('Người xóa hồ sơ');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_responsibilities');
    }
};
