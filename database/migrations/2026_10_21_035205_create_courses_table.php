<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('provider'); // DeepLearning.AI, Frontend Masters, DesignCode, Wharton Online
            $table->string('hours'); // 60 Hours
            $table->string('title'); // Advanced SQL & Data Warehousing
            $table->text('description');
            $table->string('status'); // Completed • Grade: 98%
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
