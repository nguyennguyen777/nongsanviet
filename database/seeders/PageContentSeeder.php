<?php

namespace Database\Seeders;

use App\Models\PageContent;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Thông tin liên hệ công ty
        PageContent::updateOrCreate(
            ['page_key' => 'contact_info'],
            [
                'title' => 'NÔNG SẢN VIỆT NAM',
                'content' => null,
                'image' => null,
                'extra_data' => [
                    'address' => 'Ô số 20 LK 03, khu shophouse Loong Toòng, P Yết Kiêu, TP Hạ Long, tỉnh Quảng Ninh.',
                    'hotline' => '0889 333 618',
                    'email' => 'nongsanviet.net.vn@gmail.com',
                    'fanpage_url' => 'https://www.facebook.com/nongsanviet.net.vn/',
                    'fanpage_name' => 'Nông Sản Việt Nam',
                ],
            ]
        );
    }
}
