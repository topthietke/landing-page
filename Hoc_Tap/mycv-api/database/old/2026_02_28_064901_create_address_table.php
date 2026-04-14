<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Tạo bảng addresses dùng để lưu trữ thông tin địa chỉ của ứng viên,
     * bao gồm liên kết đến tỉnh/thành phố, phường/xã và địa chỉ chi tiết.
     */
    public function up(): void
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id()->comment('Khóa chính, tự động tăng');
            // $table->bigInteger('candidate_id')->nullable()->default(NULL)->comment('ID của ứng viên liên kết với địa chỉ này, kiểu string để hỗ trợ UUID hoặc mã dạng chuỗi');
            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete()
                ->comment('ID của ứng viên sở hữu ngoại ngữ này');
            $table->bigInteger('provinces_id')->nullable()->default(NULL)->comment('ID của tỉnh/thành phố, liên kết đến bảng provinces');
            $table->bigInteger('wards_id')->nullable()->default(NULL)->comment('ID của phường/xã, liên kết đến bảng wards');
            $table->string('adress')->nullable()->default(NULL)->comment('Địa chỉ chi tiết của ứng viên: số nhà, tên đường, khu vực, ...');
            $table->bigInteger('created_by')->nullable()->default(NULL)->comment('ID của người dùng đã tạo bản ghi này, nullable nếu hệ thống tự tạo');
            $table->bigInteger('updated_by')->nullable()->default(NULL)->comment('ID của người dùng đã cập nhật bản ghi gần nhất, nullable nếu chưa có cập nhật');
            $table->bigInteger('deleted_by')->nullable()->default(NULL)->comment('ID của người dùng đã xóa bản ghi này, nullable nếu bản ghi chưa bị xóa');
            $table->timestamps(); // Tự động thêm created_at (thời điểm tạo) và updated_at (thời điểm cập nhật)
            $table->softDeletes(); // Thêm cột deleted_at để hỗ trợ xóa mềm, bản ghi không bị xóa khỏi DB mà chỉ đánh dấu thời điểm xóa
        });
    }

    /**
     * Reverse the migrations.
     *
     * Xóa bảng addresses khi rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};