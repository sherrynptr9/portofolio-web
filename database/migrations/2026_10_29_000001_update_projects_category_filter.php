<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update existing projects that have dual badge "UI/UX & WEBSITE" to have both categories
        DB::table('projects')
            ->where('badge', 'like', '%UI/UX%WEBSITE%')
            ->where('category_filter', 'Website')
            ->update(['category_filter' => 'UI/UX Design, Website']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('projects')
            ->where('badge', 'like', '%UI/UX%WEBSITE%')
            ->where('category_filter', 'UI/UX Design, Website')
            ->update(['category_filter' => 'Website']);
    }
};
