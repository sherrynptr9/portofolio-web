<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('period');
            $table->string('position');
            $table->string('company');
            $table->text('tags')->nullable(); // comma separated
            $table->text('summary')->nullable();
            $table->string('contributions_title')->nullable();
            $table->text('contributions')->nullable(); // formatted text or bullets
            $table->string('metric_1_val')->nullable();
            $table->text('metric_1_desc')->nullable();
            $table->string('metric_2_val')->nullable();
            $table->text('metric_2_desc')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
