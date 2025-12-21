<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Cafe Bich Thao đạt 5 sao trong Hội đồng đánh giá, phân hạng sản phẩm OCOP quốc gia năm 2020',
                'slug' => 'cafe-bich-thao-dat-5-sao-trong-hoi-dong-danh-gia-phan-hang-san-pham-ocop-quoc-gia-nam-2020',
                'content' => 'Sáng ngày 26/5, tại Bộ Nông nghiệp và PTNT đã diễn ra phiên họp Hội đồng đánh giá, phân hạng sản phẩm OCOP quốc gia năm 2020. Cafe Bich Thao đã vinh dự đạt được 5 sao trong đợt đánh giá này.',
                'image' => null,
                'status' => true,
            ],
            [
                'title' => 'NHỮNG LỢI ÍCH TUYỆT VỜI CỦA QUẢ QUÝT MÀ BẠN KHÔNG NÊN BỎ QUA',
                'slug' => 'nhung-loi-ich-tuyet-voi-cua-qua-quyt-ma-ban-khong-nen-bo-qua',
                'content' => 'Không chỉ là một loại quả chứa nhiều vitamin tốt cho sức khỏe, bạn sẽ ngạc nhiên với rất nhiều lợi ích của quả quýt từ việc tăng cường miễn dịch đến làm đẹp da.',
                'image' => null,
                'status' => true,
            ],
            [
                'title' => '13 tác dụng tuyệt vời khi ăn dưa lưới',
                'slug' => '13-tac-dung-tuyet-voi-khi-dua-luoi',
                'content' => 'Dưa lưới giờ đây đã trở thành loại trái cây được nhiều người tin dùng vì không chỉ ngon mà còn bổ dưỡng. Vậy những lợi ích cụ thể của dưa lưới là gì?',
                'image' => null,
                'status' => true,
            ],
            [
                'title' => 'Gợi ý thực đơn các món vừa ngon vừa giúp tăng cường đề kháng phòng dịch',
                'slug' => 'goi-y-thuc-don-cac-mon-vua-ngon-vua-giup-tang-cuong-de-khang-phong-dich',
                'content' => 'Bên cạnh việc nấu các món ngon thì việc lựa chọn nấu món gì tốt cho sức khỏe, tăng cường sức đề kháng cũng rất quan trọng trong mùa dịch.',
                'image' => null,
                'status' => true,
            ],
            [
                'title' => 'Ăn sứa giúp thanh nhiệt, giải độc',
                'slug' => 'sua-giup-thanh-nhiet-giai-doc',
                'content' => 'Theo y học cổ truyền, sứa tính bình vị mặn, có tác dụng thanh nhiệt giải độc, hoá đờm, hạ áp, khứ phong trừ thấp, an thần.',
                'image' => null,
                'status' => true,
            ],
            [
                'title' => 'Những loại nước uống giải nhiệt trong ngày nắng nóng mùa hè',
                'slug' => 'nhung-loai-nuoc-uong-giai-nhiet-trong-ngay-nang-nong-mua-he',
                'content' => 'Trong những ngày nắng nóng gắt mùa hè, uống những loại nước giải nhiệt này để thanh lọc cơ thể lại giúp cơ thể luôn khỏe mạnh.',
                'image' => null,
                'status' => true,
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
