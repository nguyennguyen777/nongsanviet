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
            // Thêm image3 đến image8
            $table->string('image3')->nullable()->after('image2');
            $table->string('image4')->nullable()->after('image3');
            $table->string('image5')->nullable()->after('image4');
            $table->string('image6')->nullable()->after('image5');
            $table->string('image7')->nullable()->after('image6');
            $table->string('image8')->nullable()->after('image7');
            
            // Thêm description3 đến description8 (và các phiên bản đa ngôn ngữ)
            $table->text('description3')->nullable()->after('description2_zh');
            $table->text('description3_en')->nullable()->after('description3');
            $table->text('description3_zh')->nullable()->after('description3_en');
            
            $table->text('description4')->nullable()->after('description3_zh');
            $table->text('description4_en')->nullable()->after('description4');
            $table->text('description4_zh')->nullable()->after('description4_en');
            
            $table->text('description5')->nullable()->after('description4_zh');
            $table->text('description5_en')->nullable()->after('description5');
            $table->text('description5_zh')->nullable()->after('description5_en');
            
            $table->text('description6')->nullable()->after('description5_zh');
            $table->text('description6_en')->nullable()->after('description6');
            $table->text('description6_zh')->nullable()->after('description6_en');
            
            $table->text('description7')->nullable()->after('description6_zh');
            $table->text('description7_en')->nullable()->after('description7');
            $table->text('description7_zh')->nullable()->after('description7_en');
            
            $table->text('description8')->nullable()->after('description7_zh');
            $table->text('description8_en')->nullable()->after('description8');
            $table->text('description8_zh')->nullable()->after('description8_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'image3', 'image4', 'image5', 'image6', 'image7', 'image8',
                'description3', 'description3_en', 'description3_zh',
                'description4', 'description4_en', 'description4_zh',
                'description5', 'description5_en', 'description5_zh',
                'description6', 'description6_en', 'description6_zh',
                'description7', 'description7_en', 'description7_zh',
                'description8', 'description8_en', 'description8_zh',
            ]);
        });
    }
};
