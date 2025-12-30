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
                'slug' => 'du-lich-ninh-binh',
                'title' => 'Du lịch Ninh Bình',
                'title1' => 'Điểm du lịch thứ nhất',
                'description' => 'Khám phá vẻ đẹp thiên nhiên hùng vĩ với những hang động kỳ vĩ, những dòng sông trong xanh và cảnh quan non nước hữu tình.',
                'image' => 'dulich/mienbac/mai-chau.png',
                'title2' => 'Điểm du lịch thứ hai',
                'description2' => 'Trải nghiệm văn hóa địa phương độc đáo, thưởng thức ẩm thực đặc sản và tận hưởng không khí trong lành của vùng đất cố đô.',
                'image2' => 'dulich/mienbac/mai-chau.png',
            ],
            [
                'slug' => 'tuyet-tinh-coc-ninh-binh',
                'title' => 'Ngỡ ngàng vẻ đẹp của "tuyệt tình cốc" ở Ninh Bình',
                'description' => 'Trải nghiệm cảnh sắc trong vắt tại Ninh Bình.',
                'image' => 'products/sanpham1.jpg',
            ],
            [
                'slug' => 'du-lich-quang-ninh',
                'title' => 'Du lịch Quảng Ninh',
                'title1' => 'Vịnh Hạ Long',
                'description' => 'Di sản thiên nhiên thế giới với hàng nghìn hòn đảo đá vôi kỳ vĩ, hang động bí ẩn và làn nước trong xanh.',
                'image' => 'products/sanpham2.jpg',
                'title2' => 'Bãi Cháy',
                'description2' => 'Bãi biển đẹp với cát trắng mịn, nước biển trong xanh, là nơi lý tưởng để nghỉ dưỡng và thư giãn.',
                'image2' => 'products/sanpham2.jpg',
                'title3' => 'Đảo Cô Tô',
                'description3' => 'Hòn đảo xinh đẹp với bãi biển hoang sơ, cảnh quan thiên nhiên tuyệt đẹp và không khí trong lành.',
                'image3' => 'products/sanpham2.jpg',
                'title4' => 'Yên Tử',
                'description4' => 'Ngọn núi linh thiêng với hệ thống chùa chiền cổ kính, rừng thông xanh mát và không gian tâm linh thanh tịnh.',
                'image4' => 'products/sanpham2.jpg',
                'title5' => 'Bảo tàng Quảng Ninh',
                'description5' => 'Nơi lưu giữ và trưng bày những giá trị văn hóa, lịch sử đặc sắc của vùng đất Quảng Ninh.',
                'image5' => 'products/sanpham2.jpg',
                'title6' => 'Chợ Hạ Long',
                'description6' => 'Khu chợ địa phương sầm uất, nơi bạn có thể mua sắm đặc sản, hải sản tươi sống và quà lưu niệm.',
                'image6' => 'products/sanpham2.jpg',
                'title7' => 'Hang Sửng Sốt',
                'description7' => 'Một trong những hang động đẹp nhất vịnh Hạ Long với hệ thống nhũ đá độc đáo và ánh sáng tự nhiên kỳ ảo.',
                'image7' => 'products/sanpham2.jpg',
                'title8' => 'Đảo Tuần Châu',
                'description8' => 'Khu du lịch nghỉ dưỡng cao cấp với bãi biển đẹp, các hoạt động giải trí đa dạng và dịch vụ du lịch chất lượng.',
                'image8' => 'products/sanpham2.jpg',
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
            $data = [
                'title' => $service['title'],
                'description' => $service['description'],
                'image' => $service['image'],
                'status' => 1,
            ];
            
            // Thêm title1 nếu có
            if (isset($service['title1'])) {
                $data['title1'] = $service['title1'];
            }
            
            // Thêm image2-image8, title2-title8 và description2-description8 nếu có
            for ($i = 2; $i <= 8; $i++) {
                $imageKey = 'image' . $i;
                $titleKey = 'title' . $i;
                $descriptionKey = 'description' . $i;
                
                if (isset($service[$imageKey])) {
                    $data[$imageKey] = $service[$imageKey];
                }
                if (isset($service[$titleKey])) {
                    $data[$titleKey] = $service[$titleKey];
                }
                if (isset($service[$descriptionKey])) {
                    $data[$descriptionKey] = $service[$descriptionKey];
                }
            }
            
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $data
            );
        }
    }
}
