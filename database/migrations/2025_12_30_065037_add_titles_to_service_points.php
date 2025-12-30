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
            // Thêm title2 đến title8 (và các phiên bản đa ngôn ngữ) sau image tương ứng
            $table->string('title2')->nullable()->after('image2');
            $table->string('title2_en')->nullable()->after('title2');
            $table->string('title2_zh')->nullable()->after('title2_en');
            
            $table->string('title3')->nullable()->after('image3');
            $table->string('title3_en')->nullable()->after('title3');
            $table->string('title3_zh')->nullable()->after('title3_en');
            
            $table->string('title4')->nullable()->after('image4');
            $table->string('title4_en')->nullable()->after('title4');
            $table->string('title4_zh')->nullable()->after('title4_en');
            
            $table->string('title5')->nullable()->after('image5');
            $table->string('title5_en')->nullable()->after('title5');
            $table->string('title5_zh')->nullable()->after('title5_en');
            
            $table->string('title6')->nullable()->after('image6');
            $table->string('title6_en')->nullable()->after('title6');
            $table->string('title6_zh')->nullable()->after('title6_en');
            
            $table->string('title7')->nullable()->after('image7');
            $table->string('title7_en')->nullable()->after('title7');
            $table->string('title7_zh')->nullable()->after('title7_en');
            
            $table->string('title8')->nullable()->after('image8');
            $table->string('title8_en')->nullable()->after('title8');
            $table->string('title8_zh')->nullable()->after('title8_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'title2', 'title2_en', 'title2_zh',
                'title3', 'title3_en', 'title3_zh',
                'title4', 'title4_en', 'title4_zh',
                'title5', 'title5_en', 'title5_zh',
                'title6', 'title6_en', 'title6_zh',
                'title7', 'title7_en', 'title7_zh',
                'title8', 'title8_en', 'title8_zh',
            ]);
        });
    }
};
