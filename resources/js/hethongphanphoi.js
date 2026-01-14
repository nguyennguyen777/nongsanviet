document.addEventListener("DOMContentLoaded", function () {
    const provinceSelect = document.getElementById("tinh-thanh");
    const districtSelect = document.getElementById("quan-huyen");
    const findBtn = document.querySelector(".find-map");
    const API_BASE = "https://provinces.open-api.vn/api";

    // Hàm làm sạch tên để dùng cho value gửi về server (lọc LIKE trong DB)
    const cleanName = (name) => {
        if (!name) return "";
        // Bỏ tiền tố hành chính, giữ nguyên dấu để LIKE gần giống
        return name
            .replace(/^(Tỉnh|Thành phố)\s+/i, "")
            .replace(/^(Quận|Huyện|Thị xã|Thành phố)\s+/i, "")
            .trim();
    };

    const resetDistrictSelect = () => {
        if (!districtSelect) return;
        districtSelect.innerHTML = "";
        const defaultOpt = document.createElement("option");
        defaultOpt.value = "";
        defaultOpt.textContent = "Chọn quận/huyện/thị xã";
        districtSelect.appendChild(defaultOpt);
    };

    const items = Array.from(document.querySelectorAll(".location-item"));
    const noMessage = document.getElementById("no-location-message");

    // Khởi tạo Google Map đơn giản từ danh sách điểm phân phối
    let map = null;
    let activeMarker = null;

    const initMapFromItems = () => {
        const mapEl = document.getElementById("map-canvas");
        if (!mapEl || !window.google || !window.google.maps) {
            return;
        }

        // Xóa nội dung map cũ (được copy từ HTML gốc) để tránh xung đột
        mapEl.innerHTML = "";

        // Lấy điểm đầu tiên có lat/long làm center
        const firstWithLatLng = items.find(
            (item) => item.dataset.lat && item.dataset.long
        );

        const defaultCenter = firstWithLatLng
            ? {
                  lat: parseFloat(firstWithLatLng.dataset.lat),
                  lng: parseFloat(firstWithLatLng.dataset.long),
              }
            : { lat: 16.047079, lng: 108.20623 }; // Đà Nẵng mặc định

        map = new google.maps.Map(mapEl, {
            center: defaultCenter,
            zoom: 6,
        });

        // Tạo marker cho từng location-item
        items.forEach((item) => {
            const lat = parseFloat(item.dataset.lat);
            const lng = parseFloat(item.dataset.long);
            if (isNaN(lat) || isNaN(lng)) return;

            const marker = new google.maps.Marker({
                position: { lat, lng },
                map,
                title: item.querySelector("strong")?.textContent || "",
            });

            // Gắn marker vào item để dùng lại khi click
            item._marker = marker;
        });
    };

    // Khi click vào một nhà phân phối thì focus marker tương ứng trên map
    items.forEach((item) => {
        item.addEventListener("click", () => {
            if (!map) return;

            const lat = parseFloat(item.dataset.lat);
            const lng = parseFloat(item.dataset.long);
            if (isNaN(lat) || isNaN(lng)) return;

            const position = { lat, lng };
            map.panTo(position);
            map.setZoom(12);

            // Bật animation cho marker đang chọn
            if (activeMarker) {
                activeMarker.setAnimation(null);
            }

            const marker = item._marker
                ? item._marker
                : new google.maps.Marker({ position, map });

            marker.setAnimation(google.maps.Animation.BOUNCE);
            activeMarker = marker;
        });
    });

    const loadProvinces = async () => {
        if (!provinceSelect) return;
        try {
            const res = await fetch(`${API_BASE}/p/`);
            if (!res.ok) return;
            const data = await res.json();

            data.forEach((p) => {
                const opt = document.createElement("option");
                opt.value = cleanName(p.name); // giá trị dùng để search LIKE trong DB
                opt.textContent = p.name; // hiển thị đúng tên từ API
                opt.dataset.code = p.code; // lưu code để gọi API lấy districts
                provinceSelect.appendChild(opt);
            });
        } catch (e) {
            console.error("Không thể tải danh sách tỉnh/thành từ API", e);
        }
    };

    const loadDistricts = async (provinceCode) => {
        resetDistrictSelect();
        if (!provinceCode) return;

        try {
            // Lấy lại thông tin tỉnh theo code để có danh sách districts
            const res = await fetch(`${API_BASE}/p/${provinceCode}?depth=2`);
            if (!res.ok) return;
            const data = await res.json();
            if (!data.districts) return;

            data.districts.forEach((d) => {
                const opt = document.createElement("option");
                opt.value = cleanName(d.name); // giá trị để search LIKE
                opt.textContent = d.name;
                districtSelect.appendChild(opt);
            });
        } catch (e) {
            console.error("Không thể tải danh sách quận/huyện từ API", e);
        }
    };

    // Hàm lọc danh sách điểm phân phối trên client (không reload trang)
    const filterList = () => {
        const province = (provinceSelect?.value || "").toLowerCase();
        const district = (districtSelect?.value || "").toLowerCase();
        let visible = 0;

        items.forEach((item) => {
            const itemProvince = (item.dataset.province || "")
                .trim()
                .toLowerCase();
            const itemDistrict = (item.dataset.district || "")
                .trim()
                .toLowerCase();

            // So khớp "chứa" để linh hoạt giữa "Tỉnh Hà Giang" và "Hà Giang", không phân biệt hoa/thường
            const matchProvince =
                !province ||
                itemProvince.includes(province) ||
                province.includes(itemProvince);

            const matchDistrict =
                !district ||
                itemDistrict.includes(district) ||
                district.includes(itemDistrict);

            const match = matchProvince && matchDistrict;

            item.style.display = match ? "block" : "none";
            if (match) visible += 1;
        });

        if (noMessage) {
            noMessage.style.display = visible === 0 ? "block" : "none";
        }
    };

    provinceSelect?.addEventListener("change", () => {
        const selected = provinceSelect.selectedOptions[0];
        const provinceCode = selected ? selected.dataset.code : null;
        if (provinceCode) {
            loadDistricts(provinceCode);
        } else {
            resetDistrictSelect();
        }
        filterList();
    });

    districtSelect?.addEventListener("change", filterList);

    findBtn?.addEventListener("click", (e) => {
        e.preventDefault();
        filterList();
        // Scroll đến danh sách kết quả
        const list = document.querySelector(".map-content");
        if (list) {
            list.scrollIntoView({ behavior: "smooth", block: "start" });
        }
    });

    // Khởi tạo: load danh sách tỉnh từ API, sau đó filter danh sách (hiển thị tất cả nếu chưa chọn điều kiện)
    loadProvinces().then(() => {
        filterList();

        // Khởi tạo Google Map sau khi DOM và dữ liệu đã sẵn sàng
        if (window.google && window.google.maps) {
            initMapFromItems();
        } else {
            // Nếu script Google Maps được load với callback=initMapFromItems
            window.initMap = initMapFromItems;
        }
    });
});
