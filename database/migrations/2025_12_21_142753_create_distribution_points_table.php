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
        Schema::create('distribution_points', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên cửa hàng/điểm phân phối
            $table->text('address'); // Địa chỉ
            $table->string('phone')->nullable(); // Hotline
            $table->string('email')->nullable(); // Email
            $table->string('fanpage')->nullable(); // Link fanpage
            $table->string('website')->nullable(); // Website
            $table->decimal('latitude', 10, 8)->nullable(); // Vĩ độ
            $table->decimal('longitude', 11, 8)->nullable(); // Kinh độ
            $table->string('province')->nullable(); // Tỉnh/thành phố
            $table->string('district')->nullable(); // Quận/huyện
            $table->integer('sort_order')->default(0); // Thứ tự sắp xếp
            $table->boolean('status')->default(true); // Trạng thái
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribution_points');
    }
};
