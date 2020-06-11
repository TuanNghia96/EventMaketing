<?php 
namespace App\Facade;

class Helper
{
    /**
     * get upper case of string
     * 
     * @param  string $str string need uppercase
     * @return string
     */	
    public function toUpperCase($name)
    {
        return mb_strtoupper($name, 'UTF-8');
    }

    /**
     * @return array
     */
    public function getLocation()
    {
        return [
            'AEON MALL Hà Đông, Phố Hoàng Văn Thụ, Dương Nội, Hà Đông, Hà Nội',
            'Bana Hills Cable Station, Hòa Vang, Da Nang, Việt Nam',
            'Chợ Nguyễn Công Trứ, Nguyễn Công Trứ, Phố Huế, Hai Bà Trưng, Hà Nội',
            '68 Dương Đình Nghệs, Yên Hoà, Cầu Giấy, Hà Nội',
            'Ecopark, Khu đô thị Ecopark, Xuân Quan, Văn Giang, Hưng Yên',
            'Flamingo Đại Lải Resort, Lò Đúc, Đồng Xuân, Hai Bà Trưng, Hà Nội',
            'Golden palace, Đồng Me, Mễ Trì, Nam Từ Liêm, Hà Nội',
            '219 Hà Trì, Hà Đông, Hà Nội',
            'Indochina Plaza Hanoi Residences, Xuân Thủy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội',
            'JW Marriott Hotel Hanoi, Đỗ Đức Dục, Road, Mễ Trì, Từ Liêm, Hà Nội',
            'Keangnam Landmark Tower 72, Phạm Hùng, Keangnam, Mễ Trì, Nam Từ Liêm, Hà Nội',
            'MobileCity Cầu Giấy, Đường Cầu Giấy, Dịch Vọng, Cầu Giấy, Hà Nội',
            'Nhà C2, Bách Khoa, Hai Bà Trưng, Hà Nội',
            'Ô Chợ Dừa, Đống Đa, Hà Nội',
            'Quán Ăn Ngon, Toà nhà 25T2, Nguyễn Thị Thập, Trung Hòa Nhân Chính, Trung Hoà, Cầu Giấy, Hà Nội',
            'Phạm Hùng, Cầu Giấy, Hà Nội',
            'Royal City, Ngõ 72 - Nguyễn Trãi, Khu đô thị Royal City, Thượng Đình, Thanh Xuân, Hà Nội',
            '7 Ngõ 122 - Láng, Thịnh Quang, Đống Đa, Hà Nội',
            'Hyundai Hà Nội, Trần Duy Hưng, Trung Hoà, Cầu Giấy, Hà Nội',
            'Udic Complex - N04, Hoàng Đạo Thúy, Trung Hòa Nhân Chính, Trung Hoà, Cầu Giấy, Hà Nội',
            'Vinhomes Royal City, Ngõ 72 - Nguyễn Trãi, Khu đô thị Royal City, Thượng Đình, Thanh Xuân, Hà Nội',
            'Xuân La, Tây Hồ, Hà Nội',
            '77 Yên Phúc, Phúc La, Hà Đông, Hà Nội',
            'WaterMark Hồ Tây, Đường Lạc Long Quân, Nghĩa Đô, Tây Hồ, Hà Nội',
            'ZARA, Bà Triệu, Lê Đại Hành, Hai Bà Trưng, Hà Nội',
            'Long Biên 1, Long Biên, Hà Nội',
            'Văn Điển, Đường Ngọc Hồi, Văn Điển, Thanh Trì, Hà Nội',
        ];
    }
}
?>
