<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Dữ liệu từ header navigation UI - 100% chính xác
     */
    public function run(): void
    {
        // Vùng miền Bắc (15 tỉnh thành)
        $bac_provinces = [
            ['name' => 'Bắc Kạn', 'name_en' => 'Bac Kan', 'name_zh' => '北涧省', 'slug' => 'bac-kan', 'code' => 'BK'],
            ['name' => 'Bắc Ninh', 'name_en' => 'Bac Ninh', 'name_zh' => '北宁省', 'slug' => 'bac-ninh', 'code' => 'BN'],
            ['name' => 'Hà Giang', 'name_en' => 'Ha Giang', 'name_zh' => '河江省', 'slug' => 'ha-giang', 'code' => 'HG'],
            ['name' => 'Hà Nội', 'name_en' => 'Hanoi', 'name_zh' => '河内市', 'slug' => 'ha-noi', 'code' => 'HN'],
            ['name' => 'Lạng Sơn', 'name_en' => 'Lang Son', 'name_zh' => '谅山省', 'slug' => 'lang-son', 'code' => 'LS'],
            ['name' => 'Mai Châu', 'name_en' => 'Mai Chau', 'name_zh' => '美州县', 'slug' => 'mai-chau', 'code' => 'MC'],
            ['name' => 'Mộc Châu', 'name_en' => 'Moc Chau', 'name_zh' => '木州县', 'slug' => 'moc-chau', 'code' => 'MOC'],
            ['name' => 'Ninh Bình', 'name_en' => 'Ninh Binh', 'name_zh' => '宁平省', 'slug' => 'ninh-binh', 'code' => 'NB'],
            ['name' => 'Quảng Ninh', 'name_en' => 'Quang Ninh', 'name_zh' => '广宁省', 'slug' => 'quang-ninh', 'code' => 'QN'],
            ['name' => 'Lào Cai', 'name_en' => 'Lao Cai', 'name_zh' => '老街省', 'slug' => 'lao-cai', 'code' => 'LC'],
            ['name' => 'Sơn La', 'name_en' => 'Son La', 'name_zh' => '山罗省', 'slug' => 'son-la', 'code' => 'SL'],
            ['name' => 'Tây Bắc', 'name_en' => 'Tay Bac', 'name_zh' => '西北区', 'slug' => 'tay-bac', 'code' => 'TB'],
            ['name' => 'Điện Biên', 'name_en' => 'Dien Bien', 'name_zh' => '奠边省', 'slug' => 'dien-bien', 'code' => 'DB'],
            ['name' => 'Đông Bắc', 'name_en' => 'Dong Bac', 'name_zh' => '东北区', 'slug' => 'dong-bac', 'code' => 'DOB'],
            ['name' => 'Hòa Bình', 'name_en' => 'Hoa Binh', 'name_zh' => '和平省', 'slug' => 'hoa-binh', 'code' => 'HB'],
        ];

        // Vùng miền Trung (19 tỉnh thành)
        $trung_provinces = [
            ['name' => 'Buôn Ma Thuột', 'name_en' => 'Buon Ma Thuot', 'name_zh' => '邦美蜀', 'slug' => 'buon-ma-thuot', 'code' => 'BMT'],
            ['name' => 'Bình Thuận', 'name_en' => 'Binh Thuan', 'name_zh' => '平顺省', 'slug' => 'binh-thuan', 'code' => 'BT'],
            ['name' => 'Bình Định', 'name_en' => 'Binh Dinh', 'name_zh' => '平定省', 'slug' => 'binh-dinh', 'code' => 'BD'],
            ['name' => 'Huế', 'name_en' => 'Hue', 'name_zh' => '顺化市', 'slug' => 'hue', 'code' => 'HUE'],
            ['name' => 'Quảng Nam', 'name_en' => 'Quang Nam', 'name_zh' => '广南省', 'slug' => 'quang-nam', 'code' => 'QNA'],
            ['name' => 'Khánh Hòa', 'name_en' => 'Khanh Hoa', 'name_zh' => '庆和省', 'slug' => 'khanh-hoa', 'code' => 'KH'],
            ['name' => 'Nghệ An', 'name_en' => 'Nghe An', 'name_zh' => '义安省', 'slug' => 'nghe-an', 'code' => 'NA'],
            ['name' => 'Ninh Thuận', 'name_en' => 'Ninh Thuan', 'name_zh' => '宁顺省', 'slug' => 'ninh-thuan', 'code' => 'NT'],
            ['name' => 'Phan Thiết', 'name_en' => 'Phan Thiet', 'name_zh' => '潘切市', 'slug' => 'phan-thiet', 'code' => 'PT'],
            ['name' => 'Phú Yên', 'name_en' => 'Phu Yen', 'name_zh' => '富安省', 'slug' => 'phu-yen', 'code' => 'PY'],
            ['name' => 'Quảng Bình', 'name_en' => 'Quang Binh', 'name_zh' => '广平省', 'slug' => 'quang-binh', 'code' => 'QB'],
            ['name' => 'Tây Nguyên', 'name_en' => 'Tay Nguyen', 'name_zh' => '西原区', 'slug' => 'tay-nguyen', 'code' => 'TN'],
            ['name' => 'Đà Lạt', 'name_en' => 'Da Lat', 'name_zh' => '大叻市', 'slug' => 'da-lat', 'code' => 'DL'],
            ['name' => 'Đà Nẵng', 'name_en' => 'Da Nang', 'name_zh' => '岘港市', 'slug' => 'da-nang', 'code' => 'DN'],
            ['name' => 'Đảo Bình Ba', 'name_en' => 'Dao Binh Ba', 'name_zh' => '平安岛', 'slug' => 'dao-binh-ba', 'code' => 'DBB'],
            ['name' => 'Đảo Bình Hưng', 'name_en' => 'Dao Binh Hung', 'name_zh' => '平兴岛', 'slug' => 'dao-binh-hung', 'code' => 'DBHU'],
            ['name' => 'Quy Nhơn', 'name_en' => 'Quy Nhon', 'name_zh' => '归仁市', 'slug' => 'quy-nhon', 'code' => 'QNH'],
            ['name' => 'Đảo Bà Lụa', 'name_en' => 'Dao Ba Lua', 'name_zh' => '岭山岛', 'slug' => 'dao-ba-lua', 'code' => 'DBL'],
            ['name' => 'Hà Tĩnh', 'name_en' => 'Ha Tinh', 'name_zh' => '河静省', 'slug' => 'ha-tinh', 'code' => 'HT'],
        ];

        // Vùng miền Nam (17 tỉnh thành)
        $nam_provinces = [
            ['name' => 'An Giang', 'name_en' => 'An Giang', 'name_zh' => '安江省', 'slug' => 'an-giang', 'code' => 'AG'],
            ['name' => 'Bạc Liêu', 'name_en' => 'Bac Lieu', 'name_zh' => '薄辽省', 'slug' => 'bac-lieu', 'code' => 'BL'],
            ['name' => 'Bến Tre', 'name_en' => 'Ben Tre', 'name_zh' => '槟椥省', 'slug' => 'ben-tre', 'code' => 'BTE'],
            ['name' => 'Châu Đốc', 'name_en' => 'Chau Doc', 'name_zh' => '漂阳市', 'slug' => 'chau-doc', 'code' => 'CHD'],
            ['name' => 'Cà Mau', 'name_en' => 'Ca Mau', 'name_zh' => '金瓯省', 'slug' => 'ca-mau', 'code' => 'CM'],
            ['name' => 'Côn Đảo', 'name_en' => 'Con Dao', 'name_zh' => '昆岛', 'slug' => 'con-dao', 'code' => 'CDAO'],
            ['name' => 'Cần Thơ', 'name_en' => 'Can Tho', 'name_zh' => '芹苴市', 'slug' => 'can-tho', 'code' => 'CT'],
            ['name' => 'Hà Tiên', 'name_en' => 'Ha Tien', 'name_zh' => '河仙市', 'slug' => 'ha-tien', 'code' => 'HTE'],
            ['name' => 'Kiên Giang', 'name_en' => 'Kien Giang', 'name_zh' => '坚江省', 'slug' => 'kien-giang', 'code' => 'KG'],
            ['name' => 'Long An', 'name_en' => 'Long An', 'name_zh' => '隆安省', 'slug' => 'long-an', 'code' => 'LA'],
            ['name' => 'Miền Tây', 'name_en' => 'Mien Tay', 'name_zh' => '西方区', 'slug' => 'mien-tay', 'code' => 'MTay'],
            ['name' => 'Nam Du', 'name_en' => 'Nam Du', 'name_zh' => '南渡岛', 'slug' => 'nam-du', 'code' => 'ND'],
            ['name' => 'Phú Quốc', 'name_en' => 'Phu Quoc', 'name_zh' => '富国岛', 'slug' => 'phu-quoc', 'code' => 'PQ'],
            ['name' => 'Sóc Trăng', 'name_en' => 'Soc Trang', 'name_zh' => '素茶省', 'slug' => 'soc-trang', 'code' => 'ST'],
            ['name' => 'Tiền Giang', 'name_en' => 'Tien Giang', 'name_zh' => '前江省', 'slug' => 'tien-giang', 'code' => 'TG'],
            ['name' => 'Vũng Tàu', 'name_en' => 'Vung Tau', 'name_zh' => '头顿市', 'slug' => 'vung-tau', 'code' => 'VT'],
            ['name' => 'TP Hồ Chí Minh', 'name_en' => 'Ho Chi Minh City', 'name_zh' => '胡志明市', 'slug' => 'tp-ho-chi-minh', 'code' => 'HCMC'],
        ];

        // Insert all provinces with descriptions
        $sort_order = 1;
        foreach (array_merge($bac_provinces, $trung_provinces, $nam_provinces) as $idx => $province_data) {
            $region = match (true) {
                $idx < count($bac_provinces) => 'mien-bac',
                $idx < count($bac_provinces) + count($trung_provinces) => 'mien-trung',
                default => 'mien-nam'
            };

            Province::create([
                'name' => $province_data['name'],
                'name_en' => $province_data['name_en'],
                'name_zh' => $province_data['name_zh'],
                'slug' => $province_data['slug'],
                'code' => $province_data['code'],
                'region' => $region,
                'sort_order' => $sort_order++,
                'description' => 'Du lịch ' . $province_data['name'] . ' - Khám phá vẻ đẹp tự nhiên',
                'description_en' => 'Tourism in ' . $province_data['name_en'] . ' - Discover natural beauty',
                'description_zh' => '在' . $province_data['name_zh'] . '旅游 - 发现自然美景',
                'status' => 1,
            ]);
        }
    }
}
