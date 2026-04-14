<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hoạt động (activities)
        // Hoạt động (activities)
        Schema::create('activities', function (Blueprint $table) {
            $table->id()->comment('ID hoạt động');

            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete()
                ->comment('ID của ứng viên tham gia hoạt động');

            $table->string('organization')
                ->comment('Tên tổ chức, câu lạc bộ hoặc sự kiện (ví dụ: Tiếp sức mùa thi)');

            $table->string('role')
                ->default('Member')
                ->comment('Vai trò: Trưởng nhóm, Thành viên, Tình nguyện viên...');

            $table->text('description')
                ->nullable()
                ->comment('Mô tả chi tiết nội dung hoặc đóng góp trong hoạt động');

            $table->date('start_date')
                ->nullable()
                ->comment('Ngày bắt đầu tham gia');

            $table->date('end_date')
                ->nullable()
                ->comment('Ngày kết thúc (Để trống nếu vẫn đang hoạt động)');

            $table->bigInteger('created_by')->nullable()->default(NULL)->comment('Người tạo hồ sơ');
            $table->bigInteger('updated_by')->nullable()->default(NULL)->comment('Người cập nhật hồ sơ');
            $table->bigInteger('deleted_by')->nullable()->default(NULL)->comment('Người xóa hồ sơ');            
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    public function down(): void
    {      
        Schema::dropIfExists('activities');
    }
};
