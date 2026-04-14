<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Dự án thực tế
        Schema::create('projects', function (Blueprint $table) {
            $table->id()->comment('ID dự án');
            // Khóa ngoại
            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete()
                ->comment('ID của ứng viên sở hữu dự án này');

            // Thông tin bắt buộc
            $table->string('name')
                ->comment('Tên dự án (ví dụ: Hệ thống quản lý kho)');

            $table->string('role')
                ->default('Member')
                ->comment('Vai trò trong dự án: Leader, Member, Developer, Manager...');

            // Thông tin số lượng & Khách hàng
            $table->integer('team_size')
                ->default(1)
                ->comment('Số lượng thành viên tham gia dự án');

            $table->string('client')
                ->nullable()
                ->comment('Tên khách hàng hoặc đối tác của dự án');

            // Kỹ thuật & Liên kết
            $table->string('technologies')
                ->nullable()
                ->comment('Các công nghệ sử dụng chính (ví dụ: VueJS, Python, MySQL)');

            $table->text('description')
                ->nullable()
                ->comment('Mô tả mục tiêu và kết quả của dự án');

            $table->string('url')
                ->nullable()
                ->comment('Đường dẫn demo dự án hoặc mã nguồn công khai (GitHub)');

            // Thời gian thực hiện
            $table->date('start_date')
                ->nullable()
                ->comment('Ngày bắt đầu dự án');

            $table->date('end_date')
                ->nullable()
                ->comment('Ngày kết thúc dự án (Để trống nếu dự án đang thực hiện)');

            $table->bigInteger('created_by')->nullable()->default(NULL)->comment('Người tạo hồ sơ');
            $table->bigInteger('updated_by')->nullable()->default(NULL)->comment('Người cập nhật hồ sơ');
            $table->bigInteger('deleted_by')->nullable()->default(NULL)->comment('Người xóa hồ sơ');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
