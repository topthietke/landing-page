<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Quá trình đào tạo
        Schema::create('educations', function (Blueprint $table) {
            $table->id()->comment('ID học vấn');
            // Khóa ngoại kết nối với bảng candidates - Ứng viên
            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete()
                ->comment('ID của ứng viên sở hữu học vấn này');

            // Thông tin bắt buộc
            $table->string('institution')
                ->comment('Tên trường, trung tâm hoặc tổ chức đào tạo (ví dụ: Đại học Bách Khoa)');

            $table->string('course_name')
                ->comment('Tên chuyên ngành hoặc tên khóa học (ví dụ: Khoa học máy tính)');

            $table->string('type')
                ->default('university')
                ->comment('Loại hình: university, online_course, bootcamp, certification');

            // Thông tin thời gian (Nullable để xử lý trường hợp "Đang học")
            $table->date('start_date')
                ->nullable()
                ->comment('Ngày bắt đầu học');

            $table->date('end_date')
                ->nullable()
                ->comment('Ngày kết thúc hoặc dự kiến tốt nghiệp (Để trống nếu đang học)');

            // Thông tin bổ sung
            $table->text('technologies')
                ->nullable()
                ->comment('Danh sách công nghệ, kỹ năng học được (Lưu dạng text hoặc JSON)');

            $table->bigInteger('created_by')->nullable()->default(NULL)->comment('Người tạo hồ sơ');
            $table->bigInteger('updated_by')->nullable()->default(NULL)->comment('Người cập nhật hồ sơ');
            $table->bigInteger('deleted_by')->nullable()->default(NULL)->comment('Người xóa hồ sơ');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
