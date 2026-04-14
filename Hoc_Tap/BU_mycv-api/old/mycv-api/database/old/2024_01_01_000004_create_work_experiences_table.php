<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Kinh nghiệm làm việc
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id()->comment('ID kinh nghiệm làm việc');

            // Khóa ngoại
            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete()
                ->comment('ID của ứng viên sở hữu kinh nghiệm này');

            // Thông tin bắt buộc
            $table->string('company_name')
                ->comment('Tên công ty/tổ chức từng làm việc');

            $table->string('role')
                ->comment('Chức danh/Vị trí công việc (ví dụ: Project Manager)');

            $table->date('start_date')
                ->comment('Ngày bắt đầu làm việc (Bắt buộc để tính thâm niên)');

            // Logic trạng thái công việc
            $table->boolean('is_current')
                ->default(false)
                ->comment('Trạng thái: true = Đang làm việc tại đây, false = Đã nghỉ việc');

            $table->date('end_date')
                ->nullable()
                ->comment('Ngày kết thúc công việc (Để trống nếu is_current là true)');

            // Thông tin chi tiết
            $table->string('technologies')
                ->nullable()
                ->comment('Các công nghệ/công cụ sử dụng chính (ví dụ: PHP, AWS, Jira)');

            $table->text('description')
                ->nullable()
                ->comment('Mô tả chi tiết trách nhiệm và thành tựu tại công ty');

            $table->bigInteger('created_by')->nullable()->default(NULL)->comment('Người tạo hồ sơ');
            $table->bigInteger('updated_by')->nullable()->default(NULL)->comment('Người cập nhật hồ sơ');
            $table->bigInteger('deleted_by')->nullable()->default(NULL)->comment('Người xóa hồ sơ');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
