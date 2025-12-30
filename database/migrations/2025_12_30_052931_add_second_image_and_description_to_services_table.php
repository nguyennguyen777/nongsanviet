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
            $table->string('image2')->nullable()->after('image');
            $table->text('description2')->nullable()->after('description_zh');
            $table->text('description2_en')->nullable()->after('description2');
            $table->text('description2_zh')->nullable()->after('description2_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['image2', 'description2', 'description2_en', 'description2_zh']);
        });
    }
};
