<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('issuer'); // GOOGLE • COURSERA
            $table->string('title'); // Professional Data Analytics
            $table->text('description');
            $table->string('issued_date'); // Issued: Oct 2023
            $table->string('badge_text'); // Verified Active, Top 1% Class, ID: #AWS-410972
            $table->string('badge_type')->default('green'); // green, yellow, gray
            $table->string('logo')->nullable(); // images/cert_google.png
            $table->string('link')->default('#');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};
