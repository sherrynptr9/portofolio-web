<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skill_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_key')->unique(); // ui_ux, fullstack, data_analytics
            $table->string('title');
            $table->text('subtitle');
            $table->string('icon')->default('fa-code');
            $table->string('icon_color')->default('green'); // green, red, orange
            $table->string('confidence_score')->default('Confidence 95%');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('group_key'); // ui_ux, fullstack, data_analytics
            $table->string('subgroup')->nullable(); // Frontend Development, Backend Development
            $table->string('name');
            $table->integer('percentage')->default(90);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
        Schema::dropIfExists('skill_groups');
    }
};
