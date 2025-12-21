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
        // Sử dụng updateOrCreate để tránh duplicate và không làm mất dữ liệu
        
        // Du lịch - các services chính
        Service::updateOrCreate(['slug' => 'du-lich'], ['title' => 'Du lịch', 'description' => 'Dịch vụ du lịch chất lượng', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-mien-bac'], ['title' => 'Du lịch miền bắc', 'description' => 'Tour du lịch miền Bắc', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-mien-trung'], ['title' => 'Du lịch miền trung', 'description' => 'Tour du lịch miền Trung', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-mien-nam'], ['title' => 'Du lịch miền nam', 'description' => 'Tour du lịch miền Nam', 'status' => 1]);
        
        // Các tour du lịch miền Bắc
        Service::updateOrCreate(['slug' => 'du-lich-bac-kan'], ['title' => 'Du lịch Bắc Kạn', 'description' => 'Tour du lịch Bắc Kạn', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-bac-ninh'], ['title' => 'Du lịch Bắc Ninh', 'description' => 'Tour du lịch Bắc Ninh', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-ha-giang'], ['title' => 'Du lịch Hà Giang', 'description' => 'Tour du lịch Hà Giang', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-ha-noi'], ['title' => 'Du lịch Hà Nội', 'description' => 'Tour du lịch Hà Nội', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-lang-son'], ['title' => 'Du lịch Lạng Sơn', 'description' => 'Tour du lịch Lạng Sơn', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-mai-chau'], ['title' => 'Du lịch Mai Châu', 'description' => 'Tour du lịch Mai Châu', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-moc-chau'], ['title' => 'Du lịch Mộc Châu', 'description' => 'Tour du lịch Mộc Châu', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-ninh-binh'], ['title' => 'Du lịch Ninh Bình', 'description' => 'Tour du lịch Ninh Bình', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-quang-ninh'], ['title' => 'Du lịch Quảng Ninh', 'description' => 'Tour du lịch Quảng Ninh', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-lao-cai'], ['title' => 'Du lịch Lào Cai', 'description' => 'Tour du lịch Lào Cai', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-son-la'], ['title' => 'Du lịch Sơn La', 'description' => 'Tour du lịch Sơn La', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-tay-bac'], ['title' => 'Du lịch Tây Bắc', 'description' => 'Tour du lịch Tây Bắc', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-dien-bien'], ['title' => 'Du lịch Điện Biên', 'description' => 'Tour du lịch Điện Biên', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-dong-bac'], ['title' => 'Du lịch Đông Bắc', 'description' => 'Tour du lịch Đông Bắc', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-hoa-binh'], ['title' => 'Du lịch Hòa Bình', 'description' => 'Tour du lịch Hòa Bình', 'status' => 1]);
        
        // Các tour du lịch miền Trung
        Service::updateOrCreate(['slug' => 'du-lich-buon-ma-thuot'], ['title' => 'Du lịch Buôn Ma Thuột', 'description' => 'Tour du lịch Buôn Ma Thuột', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-binh-thuan'], ['title' => 'Du lịch Bình Thuận', 'description' => 'Tour du lịch Bình Thuận', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-binh-dinh'], ['title' => 'Du lịch Bình Định', 'description' => 'Tour du lịch Bình Định', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-hue'], ['title' => 'Du lịch Huế', 'description' => 'Tour du lịch Huế', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-quang-nam'], ['title' => 'Du lịch Quảng Nam', 'description' => 'Tour du lịch Quảng Nam', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-khanh-hoa'], ['title' => 'Du lịch Khánh Hòa', 'description' => 'Tour du lịch Khánh Hòa', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-nghe-an'], ['title' => 'Du lịch Nghệ An', 'description' => 'Tour du lịch Nghệ An', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-ninh-thuan'], ['title' => 'Du lịch Ninh Thuận', 'description' => 'Tour du lịch Ninh Thuận', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-phan-thiet'], ['title' => 'Du lịch Phan Thiết', 'description' => 'Tour du lịch Phan Thiết', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-phu-yen'], ['title' => 'Du lịch Phú Yên', 'description' => 'Tour du lịch Phú Yên', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-quang-binh'], ['title' => 'Du lịch Quảng Bình', 'description' => 'Tour du lịch Quảng Bình', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-tay-nguyen'], ['title' => 'Du lịch Tây Nguyên', 'description' => 'Tour du lịch Tây Nguyên', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-da-lat'], ['title' => 'Du lịch Đà Lạt', 'description' => 'Tour du lịch Đà Lạt', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-da-nang'], ['title' => 'Du lịch Đà Nẵng', 'description' => 'Tour du lịch Đà Nẵng', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-dao-binh-ba'], ['title' => 'Du lịch Đảo Bình Ba', 'description' => 'Tour du lịch Đảo Bình Ba', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-dao-binh-hung'], ['title' => 'Du lịch Đảo Bình Hưng', 'description' => 'Tour du lịch Đảo Bình Hưng', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-quy-nhon'], ['title' => 'Du lịch Quy Nhơn', 'description' => 'Tour du lịch Quy Nhơn', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-dao-ba-lua'], ['title' => 'Du lịch Đảo Bà Lụa', 'description' => 'Tour du lịch Đảo Bà Lụa', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-ha-tinh'], ['title' => 'Du lịch Hà Tĩnh', 'description' => 'Tour du lịch Hà Tĩnh', 'status' => 1]);
        
        // Các tour du lịch miền Nam
        Service::updateOrCreate(['slug' => 'du-lich-an-giang'], ['title' => 'Du lịch An Giang', 'description' => 'Tour du lịch An Giang', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-bac-lieu'], ['title' => 'Du lịch Bạc Liêu', 'description' => 'Tour du lịch Bạc Liêu', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-ben-tre'], ['title' => 'Du lịch Bến Tre', 'description' => 'Tour du lịch Bến Tre', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-chau-doc'], ['title' => 'Du lịch Châu Đốc', 'description' => 'Tour du lịch Châu Đốc', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-ca-mau'], ['title' => 'Du lịch Cà Mau', 'description' => 'Tour du lịch Cà Mau', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-con-dao'], ['title' => 'Du lịch Côn Đảo', 'description' => 'Tour du lịch Côn Đảo', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-can-tho'], ['title' => 'Du lịch Cần Thơ', 'description' => 'Tour du lịch Cần Thơ', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-ha-tien'], ['title' => 'Du lịch Hà Tiên', 'description' => 'Tour du lịch Hà Tiên', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-kien-giang'], ['title' => 'Du lịch Kiên Giang', 'description' => 'Tour du lịch Kiên Giang', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-long-an'], ['title' => 'Du lịch Long An', 'description' => 'Tour du lịch Long An', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-mien-tay'], ['title' => 'Du lịch Miền Tây', 'description' => 'Tour du lịch Miền Tây', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-nam-du'], ['title' => 'Du lịch Nam Du', 'description' => 'Tour du lịch Nam Du', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-phu-quoc'], ['title' => 'Du lịch Phú Quốc', 'description' => 'Tour du lịch Phú Quốc', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-soc-trang'], ['title' => 'Du lịch Sóc Trăng', 'description' => 'Tour du lịch Sóc Trăng', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-tien-giang'], ['title' => 'Du lịch Tiền Giang', 'description' => 'Tour du lịch Tiền Giang', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-vung-tau'], ['title' => 'Du lịch Vũng Tàu', 'description' => 'Tour du lịch Vũng Tàu', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'du-lich-tp-ho-chi-minh'], ['title' => 'Du lịch TP Hồ Chí Minh', 'description' => 'Tour du lịch TP Hồ Chí Minh', 'status' => 1]);
        
        // Các dịch vụ khác
        Service::updateOrCreate(['slug' => 'khach-san'], ['title' => 'Khách sạn', 'description' => 'Dịch vụ khách sạn', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'nha-hang'], ['title' => 'Nhà hàng', 'description' => 'Dịch vụ nhà hàng', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'van-tai'], ['title' => 'Vận tải', 'description' => 'Dịch vụ vận tải', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'xe-khach'], ['title' => 'Xe khách', 'description' => 'Dịch vụ xe khách', 'status' => 1]);
        Service::updateOrCreate(['slug' => 'van-chuyen-hang-hoa'], ['title' => 'Vận chuyển hàng hóa', 'description' => 'Dịch vụ vận chuyển hàng hóa', 'status' => 1]);
    }
}
