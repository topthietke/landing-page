<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id()->comment('ID ứng viên');
            $table->foreignId('user_id')
                ->unique()          // Đảm bảo 1 user chỉ có 1 hồ sơ ứng viên
                ->constrained()
                ->cascadeOnDelete();
            // --- THÔNG TIN BẮT BUỘC (Không để nullable, không cần default vì phải nhập mới cho lưu) ---
            $table->string('full_name')->nullable(false)->comment('Họ và tên đầy đủ - Bắt buộc');
            $table->string('position')->comment('Vị trí ứng tuyển (ví dụ: PHP Developer) - Bắt buộc');
            // --- THÔNG TIN CÓ GIÁ TRỊ MẶC ĐỊNH (Không để nullable) ---
            $table->tinyInteger('gender')->default(0)->comment('Giới tính: 0=Nữ, 1=Nam, 2=Khác');
            $table->tinyInteger('status')->default(1)->comment('Trạng thái: 0=Ngừng hoạt động, 1=Đang hoạt động');
            // --- THÔNG TIN TÙY CHỌN (Cho phép Nullable) ---
            $table->date('birthday')->nullable(false)->comment('Ngày sinh ứng viên');
            $table->string('phone', 20)->nullable(false)->comment('Số điện thoại liên hệ');
            $table->string('email')->unique()->nullable(false)->comment('Email cá nhân (Để nullable nếu cho phép tạo hồ sơ nháp)');
            $table->text('password')->nullable(false)->comment('Số điện thoại liên hệ');
            // $table->string('address')->nullable()->default(NULL)->comment('Địa chỉ chi tiết');
            // $table->string('city')->nullable()->default(NULL)->comment('Tỉnh/Thành phố');
            $table->string('github')->nullable()->default(NULL)->comment('Link GitHub');
            $table->string('linkedin')->nullable()->default(NULL)->comment('Link LinkedIn');
            $table->string('website')->nullable()->default(NULL)->comment('Link Portfolio/Blog');
            $table->string('skype')->nullable()->default(NULL)->comment('Thông tin liên lạc Skype');
            $table->string('avatar')->nullable()->default(NULL)->comment('Đường dẫn ảnh hồ sơ');
            $table->string('cv_file')->nullable()->default(NULL)->comment('Đường dẫn file PDF/Docx');
            $table->string('marital_status')->nullable()->default(NULL)->comment('Tình trạng hôn nhân (Độc thân/Đã kết hôn)');
            $table->bigInteger('created_by')->nullable()->default(NULL)->comment('Người tạo hồ sơ');
            $table->bigInteger('updated_by')->nullable()->default(NULL)->comment('Người cập nhật hồ sơ');
            $table->bigInteger('deleted_by')->nullable()->default(NULL)->comment('Người xóa hồ sơ');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
