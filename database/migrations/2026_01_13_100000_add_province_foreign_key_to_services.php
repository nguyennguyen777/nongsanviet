<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * Add province_id column and foreign key constraint to services table
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Add foreign key constraint to existing province_id column
            $table->foreign('province_id')
                ->references('id')
                ->on('provinces')
                ->onDelete('set null'); // Set to null when province is deleted (articles can exist without province)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['province_id']);
        });
    }
};
