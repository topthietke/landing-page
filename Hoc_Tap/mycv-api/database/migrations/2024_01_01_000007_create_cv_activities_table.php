<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cv_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('informations_id')->constrained('informationss')->cascadeOnDelete();
            $table->string('org');
            $table->text('detail')->nullable();
            $table->integer('sort_order')->default(0);
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cv_activity_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained('cv_activities')->cascadeOnDelete();
            $table->text('description');
            $table->integer('sort_order')->default(0);
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cv_activity_items');
        Schema::dropIfExists('cv_activities');
    }
};
