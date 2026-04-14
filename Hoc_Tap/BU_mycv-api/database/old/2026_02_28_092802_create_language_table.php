<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        
        Schema::create('languages', function (Blueprint $table) {
            $table->id()
                  ->nullable(false)
                  ->comment('Khóa chính tự tăng');

            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete()
                ->comment('ID của ứng viên sở hữu ngoại ngữ này');

            $table->string('lang_name')
                  ->nullable(false)
                  ->comment('Tên ngôn ngữ');

            $table->text('content')
                  ->nullable(false)
                  ->comment('Nội dung mô tả ngôn ngữ');

            $table->unsignedBigInteger('created_by')
                  ->nullable(true)
                  ->default(NULL)
                  ->comment('ID người tạo bản ghi');

            $table->unsignedBigInteger('updated_by')
                  ->nullable(true)
                  ->default(NULL)
                  ->comment('ID người cập nhật bản ghi gần nhất');

            $table->unsignedBigInteger('deleted_by')
                  ->nullable(true)
                  ->default(NULL)
                  ->comment('ID người xóa bản ghi (soft delete)');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};