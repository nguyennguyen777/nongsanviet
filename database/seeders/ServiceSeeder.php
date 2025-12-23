<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cập nhật 5 dịch vụ nổi bật theo yêu cầu
        $services = [
            [
                'slug' => 'tuyet-tinh-coc-ninh-binh',
                'title' => 'Ngỡ ngàng vẻ đẹp của “tuyệt tình cốc” ở Ninh Bình',
                'description' => 'Trải nghiệm cảnh sắc trong vắt tại Ninh Bình.',
                'image' => 'products/sanpham1.jpg',
            ],
            [
                'slug' => 'du-lich-quang-ninh',
                'title' => 'Du lịch Quảng Ninh',
                'description' => 'Khám phá vịnh và biển đảo Quảng Ninh.',
                'image' => 'products/sanpham2.jpg',
            ],
            [
                'slug' => 'du-lich-quen-tho-ninh-binh',
                'title' => 'Du lịch Quèn Thờ - Ninh Bình',
                'description' => 'Tham quan Quèn Thờ hoang sơ tại Ninh Bình.',
                'image' => 'products/sanpham3.jpg',
            ],
            [
                'slug' => 'du-lich-ban-lac-mai-chau',
                'title' => 'Du lịch bản Lác - Mai Châu',
                'description' => 'Không gian bản làng bản Lác, Mai Châu.',
                'image' => 'products/sanpham4.jpg',
            ],
            [
                'slug' => 'san-may-pha-luong',
                'title' => '“Săn mây” trên đỉnh Pha Luông',
                'description' => 'Chinh phục Pha Luông và săn mây hùng vĩ.',
                'image' => 'products/sanpham5.jpg',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                [
                    'title' => $service['title'],
                    'description' => $service['description'],
                    'image' => $service['image'],
                    'status' => 1,
                ]
            );
        }
    }
}
