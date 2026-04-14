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
        Schema::create('wards', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unique()->comment('Mã phường/xã/thị trấn');
            $table->string('name')->comment('Tên phường/xã/thị trấn');
            $table->string('division_type')->comment('Loại đơn vị hành chính');
            $table->string('codename')->unique()->comment('Mã định danh dạng slug');
            $table->integer('province_code')->comment('Mã tỉnh/thành phố');
            $table->foreign('province_code')->references('code')->on('provinces')->onDelete('cascade');
            $table->bigInteger('created_by')->nullable()->default(NULL)->comment('Người tạo hồ sơ');
            $table->bigInteger('updated_by')->nullable()->default(NULL)->comment('Người cập nhật hồ sơ');
            $table->bigInteger('deleted_by')->nullable()->default(NULL)->comment('Người xóa hồ sơ');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wards');
    }
};
