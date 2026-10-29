<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->default('UI/UX & WEBSITE BUILD'); // UI/UX & WEBSITE BUILD, UI/UX, DATA ANALYST
            $table->string('category_filter')->default('All'); // UI/UX Design, Website, Data Analyst
            $table->string('title');
            $table->text('description');
            $table->string('tags')->nullable(); // Figma, User Journeys, Tokens
            $table->string('metric_badge')->nullable(); // +68% Patient Retention
            $table->string('image')->nullable();
            $table->string('link')->default('#');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
