<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('edition_tag')->default('FOLIO INDEX • VOL. IV');
            $table->string('section_number')->default('01 / Curated Biography');
            $table->string('badge_role')->default('UI/UX, Website, & Data Analyst');
            $table->string('name')->default('Sherrynita Marsya Putri Setiawan, S.Kom');
            $table->text('about_text');
            $table->string('photo')->nullable()->default('images/sherrynita_profile.jpg');
            $table->string('cv_file')->nullable()->default('#');
            $table->string('phone')->default('+62 812-3456-7890');
            $table->string('phone_note')->default('Available via WhatsApp & Call');
            $table->string('email')->default('sherrynitamarsya@gmail.com');
            $table->string('email_note')->default('Send direct message');
            $table->string('location')->default('Kec. Beji, Kota Depok');
            $table->string('location_note')->default('Jawa Barat, Indonesia (Open to WFH / Onsite)');
            $table->string('linkedin')->default('linkedin.com/in/sherrynita');
            $table->string('linkedin_url')->default('https://linkedin.com/in/sherrynita');
            $table->string('github')->default('github.com/sherrynita');
            $table->string('github_url')->default('https://github.com/sherrynita');
            $table->string('response_time')->default('< 24 Hours');
            $table->string('response_note')->default('Actively accepting new projects');
            $table->text('footer_bio')->nullable();
            $table->string('dispatch_social')->default('ReadCV • GitHub • LinkedIn • Substack');
            $table->string('office_note')->default('Office: studio@creativecraft.archive');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
