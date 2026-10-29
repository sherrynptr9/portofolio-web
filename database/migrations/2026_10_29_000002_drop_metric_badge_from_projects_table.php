<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasColumn('projects', 'metric_badge')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropColumn('metric_badge');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasColumn('projects', 'metric_badge')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->string('metric_badge')->nullable()->after('tags');
            });
        }
    }
};
