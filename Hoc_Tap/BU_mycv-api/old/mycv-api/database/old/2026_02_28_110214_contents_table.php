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
         Schema::create('contents', function (Blueprint $table) {
            $table->id()->comment('ID Chi tiết danh mục');
            $table->bigInteger('cat_id')->nullable()->default(NULL)->comment('ID của danh mục');
            $table->string('title')->comment('Tiêu đề chi tiết danh mục');
            $table->text('content')->comment('Mô tả chi tiết danh mục');
            $table->text('description')->comment('Mô tả chi tiết danh mục');            
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
        //
    }
};
