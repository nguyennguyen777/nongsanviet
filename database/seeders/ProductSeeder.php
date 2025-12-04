<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat = Category::first();
        if ($cat) {
            for ($i=1;$i<=8;$i++){
                Product::create([
                    'category_id' => $cat->id,
                    'name' => "Sản phẩm mẫu $i",
                    'slug' => 'san-pham-mau-'.$i,
                    'price' => 10000 * $i,
                    'description' => 'Mô tả ngắn cho sản phẩm mẫu '.$i,
                    'image' => null,
                    'is_featured' => $i <= 4
                ]);
            }
        }
    }
}
