<?php

namespace Database\Seeders;

use App\Models\DistributionPoint;
use Illuminate\Database\Seeder;

class DistributionPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $distributionPoints = [
            [
                'name' => 'CÔNG TY TNHH THÊU MINH TRANG',
                'address' => 'Thôn Văn Lâm, xã Ninh Hải, huyện Hoa Lư, tỉnh Ninh Bình, Việt Nam',
                'phone' => '02293618015',
                'email' => 'info@minhtrang.com.vn',
                'fanpage' => 'Minh Trang Handmade',
                'website' => 'http://minhtranghandmade.vn/',
                'latitude' => 20.258592,
                'longitude' => 105.889842,
                'province' => 'Ninh Bình',
                'district' => 'Hoa Lư',
                'sort_order' => 1,
                'status' => true,
            ],
            [
                'name' => 'CÔNG TY TRÁCH NHIỆM HỮU HẠN ĐẦU TƯ HOÀNG ANH',
                'address' => '162 Lê Thánh Tông, phường Bạch Đằng, thành phố Hạ Long, tỉnh Quảng Ninh',
                'phone' => '0912900058',
                'email' => 'hoanganhdt.halong@gmail.com',
                'fanpage' => 'https://www.facebook.com/RauQuaSachVietNam/',
                'website' => null,
                'latitude' => 20.951400,
                'longitude' => 107.083305,
                'province' => 'Quảng Ninh',
                'district' => 'Hạ Long',
                'sort_order' => 2,
                'status' => true,
            ],
            [
                'name' => 'HTX Nông nghiệp Nam Phượng',
                'address' => 'Bản Lả Mường, xã Sốp Cộp, huyện Sốp Cộp, tỉnh Sơn La',
                'phone' => '0976816499',
                'email' => 'thansopcop@gmail.com',
                'fanpage' => 'Gạo Nếp Tan Mường Và',
                'website' => 'http://gaoneptansonla.vn/',
                'latitude' => 20.800540,
                'longitude' => 103.712620,
                'province' => 'Sơn La',
                'district' => 'Sốp Cộp',
                'sort_order' => 3,
                'status' => true,
            ],
        ];

        foreach ($distributionPoints as $point) {
            DistributionPoint::updateOrCreate(
                ['name' => $point['name']],
                $point
            );
        }
    }
}
