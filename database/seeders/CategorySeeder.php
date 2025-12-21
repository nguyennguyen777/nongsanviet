<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sử dụng updateOrCreate để tránh duplicate và không làm mất dữ liệu
        // Thực phẩm và các sub-categories
        Category::updateOrCreate(['slug' => 'thuc-pham'], ['name' => 'Thực phẩm']);
        Category::updateOrCreate(['slug' => 'thuc-pham-tuoi-song'], ['name' => 'Thực phẩm tươi sống']);
        Category::updateOrCreate(['slug' => 'rau-cu-qua'], ['name' => 'Rau, củ, quả']);
        Category::updateOrCreate(['slug' => 'thit-trung-sua'], ['name' => 'Thịt, trứng, sữa tươi']);
        Category::updateOrCreate(['slug' => 'thuc-pham-tho-so-che'], ['name' => 'Thực phẩm thô, sơ chế']);
        Category::updateOrCreate(['slug' => 'gao-ngu-coc'], ['name' => 'Gạo, ngũ cốc']);
        Category::updateOrCreate(['slug' => 'mat-ong'], ['name' => 'Mật ong']);
        Category::updateOrCreate(['slug' => 'thuc-pham-che-bien'], ['name' => 'Thực phẩm chế biến']);
        Category::updateOrCreate(['slug' => 'rau-cu-qua-hat'], ['name' => 'Rau, củ, quả, hạt']);
        Category::updateOrCreate(['slug' => 'thuy-hai-san'], ['name' => 'Thủy, hải sản']);
        Category::updateOrCreate(['slug' => 'gia-vi'], ['name' => 'Gia vị']);

        // Đồ uống - Giải khát
        Category::updateOrCreate(['slug' => 'do-uong-giai-khat'], ['name' => 'Đồ uống - Giải khát']);

        // Chăm sóc cá nhân
        Category::updateOrCreate(['slug' => 'cham-soc-ca-nhan'], ['name' => 'Chăm sóc cá nhân']);

        // Thủ công mỹ nghệ
        Category::updateOrCreate(['slug' => 'thu-cong-my-nghe'], ['name' => 'Thủ công mỹ nghệ']);

        // Hoa cây cảnh
        Category::updateOrCreate(['slug' => 'hoa-cay-canh'], ['name' => 'Hoa cây cảnh']);
        Category::updateOrCreate(['slug' => 'cay-phong-thuy'], ['name' => 'Cây phong thủy']);

        // Các categories khác từ menu
        Category::updateOrCreate(['slug' => 'ruou-sam-cau'], ['name' => 'Rượu Sâm Cau']);
        Category::updateOrCreate(['slug' => 'nong-san-sach'], ['name' => 'Nông sản sạch']);
    }
}
