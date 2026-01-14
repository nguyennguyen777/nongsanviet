<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * Add parent_id column for hierarchical services (categories can have parent categories)
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Add parent_id column for self-referencing relationship
            $table->unsignedBigInteger('parent_id')->nullable()->after('id');

            // Add foreign key constraint (self-referencing)
            $table->foreign('parent_id')
                ->references('id')
                ->on('services')
                ->onDelete('set null'); // Set to null when parent service is deleted

            // Add index for better query performance
            $table->index('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropIndex(['parent_id']);
            $table->dropColumn('parent_id');
        });
    }
};
