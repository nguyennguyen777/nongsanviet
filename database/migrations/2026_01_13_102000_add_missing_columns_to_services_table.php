<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * Add missing columns to services table
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Add type column if it doesn't exist
            if (!Schema::hasColumn('services', 'type')) {
                $table->string('type')->nullable()->after('id');
            }

            // Add content_type column if it doesn't exist
            if (!Schema::hasColumn('services', 'content_type')) {
                $table->enum('content_type', ['category', 'article'])->default('article')->after('type');
            }

            // Add sort_order column if it doesn't exist
            if (!Schema::hasColumn('services', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('content_type');
            }

            // Add icon column if it doesn't exist
            if (!Schema::hasColumn('services', 'icon')) {
                $table->string('icon')->nullable()->after('sort_order');
            }

            // Add meta_title column if it doesn't exist
            if (!Schema::hasColumn('services', 'meta_title')) {
                $table->string('meta_title')->nullable();
            }

            // Add meta_description column if it doesn't exist
            if (!Schema::hasColumn('services', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            if (Schema::hasColumn('services', 'type')) {
                $table->dropColumn('type');
            }
            if (Schema::hasColumn('services', 'content_type')) {
                $table->dropColumn('content_type');
            }
            if (Schema::hasColumn('services', 'sort_order')) {
                $table->dropColumn('sort_order');
            }
            if (Schema::hasColumn('services', 'icon')) {
                $table->dropColumn('icon');
            }
            if (Schema::hasColumn('services', 'meta_title')) {
                $table->dropColumn('meta_title');
            }
            if (Schema::hasColumn('services', 'meta_description')) {
                $table->dropColumn('meta_description');
            }
        });
    }
};
