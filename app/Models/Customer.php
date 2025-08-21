<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [''];

    public static function mapGetflyDataToCustomer(array $raw): array
{
    $cf  = $raw['custom_fields'] ?? [];
    $dcf = $raw['detail_custom_fields'] ?? [];

    // contact chính (is_primary = 1) -> fallback contact đầu tiên
    $contact = [];
    if (!empty($raw['contacts']) && is_array($raw['contacts'])) {
        foreach ($raw['contacts'] as $c) {
            if (!empty($c['is_primary'])) { $contact = $c; break; }
        }
        if (!$contact) { $contact = $raw['contacts'][0] ?? []; }
    }

    // helpers
    $str  = function ($v) { return ($v === '' || $v === null) ? null : (string)$v; };
    $int  = function ($v) { return ($v === '' || $v === null) ? null : (int)$v; };
    $flt  = function ($v) {
        if ($v === '' || $v === null) return null;
        // loại dấu phẩy ngăn cách nghìn nếu có
        if (is_string($v)) $v = str_replace(',', '', $v);
        return (float)$v;
    };
    $date = function ($v) {
        if (!$v) return null;
        $ts = strtotime($v);
        return $ts ? date('Y-m-d', $ts) : null;
    };
    // mảng -> csv; nếu phần tử là object/array có id thì lấy id
    $csv = function ($v) {
        if ($v === null) return null;
        if (is_array($v)) {
            $flat = array_filter(array_map(function ($x) {
                return is_array($x) ? ($x['id'] ?? null) : $x;
            }, $v), fn ($x) => $x !== '' && $x !== null);
            return $flat ? implode(',', $flat) : null;
        }
        return (string)$v;
    };
    // lấy ID từ *_detail(s) thành csv
    $idsCsv = function ($list, $key = 'id') {
        if (!is_array($list) || empty($list)) return null;
        $ids = [];
        foreach ($list as $it) {
            if (isset($it[$key]) && $it[$key] !== '') $ids[] = (string)$it[$key];
        }
        return $ids ? implode(',', $ids) : null;
    };

    return [
        // --- cột chính ---
        'getfly_id'              => $int($raw['id'] ?? ($raw['getfly_id'] ?? null)),
        'danh_muc_data_dau_vao'  => $str($cf['danh_muc_data_dau_vao'] ?? $dcf['danh_muc_data_dau_vao'] ?? null),
        'nguon'                  => $str($cf['nguon'] ?? $dcf['nguon'] ?? null),
        'mang_kinh_doanh'        => $str($cf['mang_kinh_doanh'] ?? $dcf['mang_kinh_doanh'] ?? null),
        'nhom_nguon'             => $str($cf['nhom_nguon'] ?? $dcf['nhom_nguon'] ?? null),
        'camp'                   => $str($cf['camp'] ?? $dcf['camp'] ?? null),
        'thong_tin_chung'        => $str($cf['thong_tin_chung'] ?? $dcf['thong_tin_chung'] ?? null),

        'gender'                 => $int($raw['gender_detail']['id'] ?? $raw['gender'] ?? null),
        'account_name'           => $str($raw['account_name'] ?? null),
        'account_code'           => $str($raw['account_code'] ?? null),
        'phone_office'           => $str($raw['phone_office'] ?? ($contact['phone_home'] ?? null)),
        'email'                  => $str($raw['email'] ?? ($contact['email'] ?? null)),

        'phan_loai_bo_sung'      => $str($cf['phan_loai_bo_sung'] ?? $dcf['phan_loai_bo_sung'] ?? null),
        'birthday'               => $date($raw['birthday'] ?? null),
        'tuoi'                   => $int($cf['tuoi'] ?? $dcf['tuoi'] ?? null),
        'billing_address_street' => $str($raw['billing_address_street'] ?? null),

        'country_id'             => $int($raw['country_id'] ?? ($raw['country_detail']['id'] ?? null)),
        'province_id'            => $int($raw['province_id'] ?? null),
        'district_id'            => $int($raw['district_id'] ?? null),
        'ward_id'                => $int($raw['ward_id'] ?? null),

        // chuỗi; nếu mảng -> join
        'industry'               => $csv($raw['industry'] ?? null),
        'lieu_phap'              => $csv($cf['lieu_phap'] ?? $dcf['lieu_phap'] ?? null),
        'insight'                => $str($cf['insight'] ?? $dcf['insight'] ?? null),
        'link_mxh'               => $str($cf['link_mxh'] ?? $dcf['link_mxh'] ?? null),

        'relation_id'            => $int($raw['relation_id'] ?? ($raw['account_relation_detail']['id'] ?? null)),

        // --- Tele ---
        'benh_ly'                => $csv($cf['benh_ly'] ?? $dcf['benh_ly'] ?? null),
        'dich_vu_quan_tam'       => $str($cf['dich_vu_quan_tam'] ?? $dcf['dich_vu_quan_tam'] ?? null),
        'tai_chinh'              => $str($cf['tai_chinh'] ?? $dcf['tai_chinh'] ?? null),
        'ngay_booking_du_kien'   => $date($cf['ngay_booking_du_kien'] ?? $dcf['ngay_booking_du_kien'] ?? null),
        'booking'                => $str($cf['booking'] ?? $dcf['booking'] ?? null),

        // --- BO ---
        'cham_diem'              => $int($cf['cham_diem'] ?? $dcf['cham_diem'] ?? null),

        // --- Show ---
        'dich_vu_thuc_hien'      => $str($cf['dich_vu_thuc_hien'] ?? $dcf['dich_vu_thuc_hien'] ?? null),
        'bac_si_tu_van'          => $str($cf['bac_si_tu_van'] ?? $dcf['bac_si_tu_van'] ?? null),
        'chuyen_vien_tu_van'     => $str($cf['chuyen_vien_tu_van'] ?? $dcf['chuyen_vien_tu_van'] ?? null),
        'phan_loai_show'         => $str($cf['phan_loai_show'] ?? $dcf['phan_loai_show'] ?? null),
        'lich_su_tu_van'         => $str($cf['lich_su_tu_van'] ?? $dcf['lich_su_tu_van'] ?? null),

        // --- DD ---
        'hop_dong'               => $str($cf['hop_dong'] ?? $dcf['hop_dong'] ?? null),
        'dich_vu'                => $csv($cf['dich_vu'] ?? $dcf['dich_vu'] ?? null),
        'tong_gia_tri'           => $flt($cf['tong_gia_tri'] ?? $dcf['tong_gia_tri'] ?? null),
        'cong_no'                => $flt($cf['cong_no'] ?? $dcf['cong_no'] ?? null),
        'ngay_thu_du_kien'       => $date($cf['ngay_thu_du_kien'] ?? $dcf['ngay_thu_du_kien'] ?? null),
        'tien_thu_du_kien'       => $flt($cf['tien_thu_du_kien'] ?? $dcf['tien_thu_du_kien'] ?? null),
        'ngay_thu_thuc_te'       => $date($cf['ngay_thu_thuc_te'] ?? $dcf['ngay_thu_thuc_te'] ?? null),
        'tien_thu_thuc_te'       => $flt($cf['tien_thu_thuc_te'] ?? $dcf['tien_thu_thuc_te'] ?? null),

        // --- AF ---
        'phan_loai'              => $str($cf['phan_loai'] ?? $dcf['phan_loai'] ?? null),
        'dich_vu_af'             => $str($cf['dich_vu_af'] ?? $dcf['dich_vu_af'] ?? null),
        'lich_su_tu_van_af'      => $str($cf['lich_su_tu_van_af'] ?? $dcf['lich_su_tu_van_af'] ?? null),

        // --- Booking ---
        'dich_vu_booking'        => $csv($cf['dich_vu_booking'] ?? $dcf['dich_vu_booking'] ?? null),
        'so_luong_booking'       => $int($cf['so_luong_booking'] ?? $dcf['so_luong_booking'] ?? null),
        'ngay_du_kien_su_dung'   => $date($cf['ngay_du_kien_su_dung'] ?? $dcf['ngay_du_kien_su_dung'] ?? null),
        'ngay_thuc_te_su_dung'   => $date($cf['ngay_thuc_te_su_dung'] ?? $dcf['ngay_thuc_te_su_dung'] ?? null),
        'dia_diem_su_dung'       => $str($cf['dia_diem_su_dung'] ?? $dcf['dia_diem_su_dung'] ?? null),
        'nguoi_thuc_hien'        => $str($cf['nguoi_thuc_hien'] ?? $dcf['nguoi_thuc_hien'] ?? null),
        'feedback_booking'       => $str($cf['feedback_booking'] ?? $dcf['feedback_booking'] ?? null),

        // --- Ref ---
        'referrer_id'            => $int($raw['referrer_id'] ?? null),
        'chinh_sach_ref'         => $str($cf['chinh_sach_ref'] ?? $dcf['chinh_sach_ref'] ?? null),
        'dich_vu_ref'            => $str($cf['dich_vu_ref'] ?? $dcf['dich_vu_ref'] ?? null),
        'gia_tri_ref'            => $flt($cf['gia_tri_ref'] ?? $dcf['gia_tri_ref'] ?? null),

        // --- Thông tin khác ---
        'description'            => $str($raw['description'] ?? null),
        'creator_id'             => $int($raw['creator_id'] ?? null),
        'account_manager'        => $str($raw['account_manager'] ?? null),

        'last_contact_name'      => $str($contact['first_name'] ?? null),
        'last_contact_phone'     => $str($contact['phone_home'] ?? null),
        'last_contact_email'     => $str($contact['email'] ?? null),
        'last_contact_title'     => $str($contact['title'] ?? null),
        'last_contact_birthdate' => $date($contact['birthdate'] ?? null),
        'sic_code'               => $str($raw['sic_code'] ?? null),
        'last_contact_gender'    => $int($contact['gender_id'] ?? null),
        'publisher_code'         => $str($raw['publisher_code'] ?? null),
        'last_active'            => $raw['last_active'] ?? null, // timestamp nullable
        'last_comment'           => $str($raw['last_comment'] ?? null),
        'total_activity'         => $int($raw['total_activity'] ?? null),
        'total_f_amount'         => $flt($raw['total_f_amount'] ?? null),
        'last_contact_honorific' => $str($contact['honorifics'] ?? null),
        'total_point_bonus'      => $int($raw['total_point_bonus'] ?? null),
        'website'                => $str($raw['website'] ?? null),
        'total_revenue'          => $flt($raw['total_revenue'] ?? null),
        'count_order'            => $int($raw['count_order'] ?? null),
        'thumbnail_logo'         => $str($raw['logo'] ?? ($raw['thumbnail_logo'] ?? null)),
        // 'latitude'               => $flt($raw['latitude'] ?? null),
        // 'longitude'              => $flt($raw['longitude'] ?? null),
        // 'phone_fax'              => $str($raw['phone_fax'] ?? null),
        // 'data_dau_vao'           => $str($cf['data_dau_vao'] ?? $dcf['data_dau_vao'] ?? null),

        // 2 field này là string trong migration → join nếu là mảng, hoặc lấy id-list từ *_details
        'account_type'           => $csv($raw['account_type'] ?? ($idsCsv($raw['account_type_details'] ?? []) ?? null)),
        'account_source'         => $csv($raw['account_source'] ?? ($idsCsv($raw['account_source_details'] ?? []) ?? null)),
    ];
}




    public static function createOrUpdateCustomer(array $data): self
    {
        $customer = self::where('getfly_id', $data['getfly_id'])->first();

        if ($customer) {
            $customer->update($data);
            return $customer;
        }

        return self::create($data);
    }

}
