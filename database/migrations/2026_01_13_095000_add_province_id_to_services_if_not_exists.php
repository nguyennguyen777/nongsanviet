<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * Add province_id column if it doesn't exist
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Only add column if it doesn't exist
            if (!Schema::hasColumn('services', 'province_id')) {
                $table->unsignedBigInteger('province_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            if (Schema::hasColumn('services', 'province_id')) {
                $table->dropColumn('province_id');
            }
        });
    }
};
