<?php

namespace App\Enums;

class CustomerDefine
{
    // Danh mục data đầu vào
    public const DANH_MUC_DATA_DAU_VAO = [
        128 => 'Mua (BI)',
        129 => 'Quảng cáo (AD)',
        130 => 'Online (OR)',
        131 => 'Offline (OF)',
    ];

    // Mảng kinh doanh
    public const MANG_KINH_DOANH = [
        132 => 'MJB',
        133 => 'LMC',
        134 => 'LGP',
        135 => 'LGG',
    ];

    // Nhóm nguồn
    public const NHOM_NGUON = [
        136 => 'MKT',
        137 => 'PNS',
        138 => 'SR',
        139 => 'Collab',
        140 => 'Internal',
        141 => 'BR',
        142 => 'BOD',
        143 => 'FOC',
        144 => 'Walk-in',
    ];

    // Nguồn
    public const NGUON = [
        108 => 'FB',
        109 => 'Youtube',
        110 => 'Zalo',
        111 => 'Tiktok',
        112 => 'Web',
        113 => 'Cali',
        114 => 'Elite',
        115 => 'SR',
        116 => 'Collab',
        117 => 'Internal',
        118 => 'Mar',
        119 => 'PNS',
        120 => 'SR',
        121 => 'Collab',
        122 => 'Internal',
        123 => 'BOD',
        124 => 'FOC',
        125 => 'BOD',
        126 => 'FOC',
        127 => 'Walk-in',
    ];

    public const GIOI_TINH = [
        1 => 'Nam',
        2 => 'Nữ',
        3 => 'Khác',
    ];

    public const TRANG_THAI = [
        1 => 'Gọi được',
        3 => 'Số không tồn tại',
        5 => 'Không liên lạc được (Trên 3 ngày)',
        4 => 'Không liên lạc được (Dưới 3 ngày)',
        6 => 'Chưa phân loại',
    ];
    /**
     * Helper để lấy value từ constant theo key
     */
    public static function getValue(array $map, $key): string
    {
        return $map[$key] ?? (string)$key;
    }
}
