<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên tỉnh thành (Tiếng Việt)
            $table->string('name_en')->nullable(); // Tên tỉnh thành (English)
            $table->string('name_zh')->nullable(); // Tên tỉnh thành (Chinese)
            $table->string('slug')->unique(); // Slug cho URL: son-la, hoa-binh, etc.
            $table->enum('region', ['mien-bac', 'mien-trung', 'mien-nam']); // Vùng miền
            $table->string('code')->unique()->nullable(); // Mã tỉnh thành (nếu cần)
            $table->text('description')->nullable(); // Mô tả ngắn
            $table->text('description_en')->nullable(); // Mô tả ngắn (English)
            $table->text('description_zh')->nullable(); // Mô tả ngắn (Chinese)
            $table->string('image')->nullable(); // Ảnh đại diện
            $table->integer('sort_order')->default(0); // Thứ tự hiển thị
            $table->tinyInteger('status')->default(1); // 1: Active, 0: Inactive
            $table->timestamps();

            // Indexes
            $table->index('region');
            $table->index('slug');
            $table->index('status');
            $table->index(['region', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
