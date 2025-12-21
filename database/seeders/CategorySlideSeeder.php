<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategorySlide;
use App\Models\Category;

class CategorySlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy các category đầu tiên để tạo slide
        $categories = Category::take(5)->get();
        
        $slides = [
            ['title' => 'Thực phẩm', 'slug' => 'thuc-pham'],
            ['title' => 'Nhà hàng', 'slug' => 'nha-hang-0'],
            ['title' => 'Đồ uống - Giải khát', 'slug' => 'do-uong-giai-khat'],
            ['title' => 'Du lịch', 'slug' => 'du-lich-0'],
            ['title' => 'Thủ công mỹ nghệ', 'slug' => 'thu-cong-my-nghe'],
        ];

        foreach ($slides as $index => $slide) {
            $category = Category::where('slug', $slide['slug'])->first();
            
            CategorySlide::updateOrCreate(
                ['title' => $slide['title']],
                [
                    'category_id' => $category ? $category->id : null,
                    'image' => 'category_slides/slide_' . ($index + 1) . '.jpg',
                    'link' => $category ? '/vi/' . $category->slug : null,
                    'sort_order' => $index + 1,
                    'status' => true,
                ]
            );
        }
    }
}
