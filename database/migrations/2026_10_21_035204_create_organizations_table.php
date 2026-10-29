<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('badge_role'); // Leadership, Governance, Mentorship
            $table->string('period'); // 2021 – 2022, 2020 – 2021, 2022 – Present
            $table->string('position'); // Head of Design & Tech Division, Vice President, Mentor & Series Speaker
            $table->string('organization'); // Google Developer Student Clubs (GDSC)
            $table->text('description');
            $table->text('tangible_outcome')->nullable();
            $table->string('link')->default('#');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
