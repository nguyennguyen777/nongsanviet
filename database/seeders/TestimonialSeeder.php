<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::updateOrCreate(
            ['name' => 'Hồng Ngọc'],
            [
                'role' => 'Ca sĩ',
                'text' => 'Tôi đã từng mua sản phẩm của Nông sản Việt Nam để làm quà tặng Tết cho bố mẹ. Mọi người đều thích và an tâm khi lựa chọn mua ở đây.',
                'image' => null,
                'sort_order' => 1,
                'status' => true,
            ]
        );

        Testimonial::updateOrCreate(
            ['name' => 'Trịnh Quế'],
            [
                'role' => 'Nội trợ',
                'text' => 'Tôi rất thích mua các thực phẩm của Nông sản Việt Nam vì đảm bảo chất lượng và xuất xứ rõ ràng để chăm lo từng bữa ăn cho gia đình tôi.',
                'image' => null,
                'sort_order' => 2,
                'status' => true,
            ]
        );

        Testimonial::updateOrCreate(
            ['name' => 'Anh Mai Đức Thịnh'],
            [
                'role' => 'Giám Đốc - HTX nông nghiệp',
                'text' => 'Tại Nông Sản Việt Nam có nhiều đặc sản ngon các vùng miền. Tôi rất an tâm khi mua sản phẩm tại đây, vì tất cả sản phẩm ở đây đều đảm bảo chất lượng và có nguồn gốc rõ ràng.',
                'image' => null,
                'sort_order' => 3,
                'status' => true,
            ]
        );

        Testimonial::updateOrCreate(
            ['name' => 'Anh Đoàn Thế Xuyên'],
            [
                'role' => 'Giám Đốc - Công ty TNHH Phúc Xuyên',
                'text' => 'Các sản phẩm tại Nông Sản Việt Nam đều rất ngon và có nguồn gốc, xuất xứ rõ ràng. Vì vậy, tôi rất hài lòng và tin tưởng về chất lượng khi mua sản phẩm tại Nông Sản Việt Nam.',
                'image' => null,
                'sort_order' => 4,
                'status' => true,
            ]
        );
    }
}
