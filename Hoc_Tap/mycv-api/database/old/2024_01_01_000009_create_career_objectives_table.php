<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('career_objectives', function (Blueprint $table) {
            $table->id()->comment('ID mục tiêu nghề nghiệp');            
            $table->foreignId('candidate_id')->constrained()->cascadeOnDelete()->comment('ID của ứng viên sở hữu mục tiêu này');            
            $table->text('content')->comment('Nội dung chi tiết mục tiêu nghề nghiệp');
            $table->bigInteger('created_by')->nullable()->default(NULL)->comment('Người tạo hồ sơ');
            $table->bigInteger('updated_by')->nullable()->default(NULL)->comment('Người cập nhật hồ sơ');
            $table->bigInteger('deleted_by')->nullable()->default(NULL)->comment('Người xóa hồ sơ');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('career_objectives');
    }
};
