<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cv_work_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_experience_id')->constrained('cv_work_experiences')->cascadeOnDelete();
            $table->text('description');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cv_work_tasks');
    }
};
