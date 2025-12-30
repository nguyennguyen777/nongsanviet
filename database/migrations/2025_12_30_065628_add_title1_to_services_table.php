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
        Schema::table('services', function (Blueprint $table) {
            // Thêm title1 và các phiên bản đa ngôn ngữ sau image
            $table->string('title1')->nullable()->after('image');
            $table->string('title1_en')->nullable()->after('title1');
            $table->string('title1_zh')->nullable()->after('title1_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['title1', 'title1_en', 'title1_zh']);
        });
    }
};
