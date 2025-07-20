<?php
namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class CustomerService
{
    public function createCustomer(array $data): Customer
    {
        try {
            // Gộp cả account_data & custom_fields nếu có
            $custom = $data['custom_fields'] ?? [];

            return Customer::createCustomer(
                [
                    'account_code' => $data['account_code'] ?? null,
                ],
                [
                    'account_name' => $data['account_name'] ?? null,
                    'gender' => $data['gender'] ?? null,
                    'account_type' => json_encode($data['account_type'] ?? []),
                    'account_source' => json_encode($data['account_source'] ?? []),
                    'birthday' => $data['birthday'] ?? null,
                    'billing_address_street' => $data['billing_address_street'] ?? null,
                    'country_id' => $data['country_id'] ?? null,
                    'province_id' => $data['province_id'] ?? null,
                    'district_id' => $data['district_id'] ?? null,
                    'ward_id' => $data['ward_id'] ?? null,
                    'industry' => json_encode($data['industry'] ?? []),
                    'relation_id' => $data['relation_id'] ?? null,
                    'description' => $data['description'] ?? null,
                    'account_manager' => $data['account_manager'] ?? null,
                    'sic_code' => $data['sic_code'] ?? null,

                    // Map custom fields
                    'input_data' => Arr::get($custom, 'data_dau_vao'),
                    'additional_classification' => Arr::get($custom, 'phan_loai_bo_sung'),
                    'age' => Arr::get($custom, 'tuoi'),
                    'therapies' => json_encode(Arr::get($custom, 'lieu_phap', [])),
                    'insight' => Arr::get($custom, 'insight'),
                    'social_links' => Arr::get($custom, 'link_mxh'),
                    'medical_conditions' => json_encode(Arr::get($custom, 'benh_ly', [])),
                    'interested_service' => Arr::get($custom, 'dich_vu_quan_tam'),
                    'financial_status' => Arr::get($custom, 'tai_chinh'),
                    'expected_booking_date' => Arr::get($custom, 'ngay_booking_du_kien'),
                    'booking' => Arr::get($custom, 'booking'),
                    'score' => Arr::get($custom, 'cham_diem'),
                    'performed_service' => Arr::get($custom, 'dich_vu_thuc_hien'),
                    'consulting_doctor' => Arr::get($custom, 'bac_si_tu_van'),
                    'consulting_staff' => Arr::get($custom, 'chuyen_vien_tu_van'),
                    'classification_display' => Arr::get($custom, 'phan_loai_show'),
                    'consulting_history' => Arr::get($custom, 'lich_su_tu_van'),
                    'contract' => Arr::get($custom, 'hop_dong'),
                    'services' => json_encode(Arr::get($custom, 'dich_vu', [])),
                    'total_value' => Arr::get($custom, 'tong_gia_tri'),
                    'debt' => Arr::get($custom, 'cong_no'),
                    'expected_collection_date' => Arr::get($custom, 'ngay_thu_du_kien'),
                    'expected_revenue' => Arr::get($custom, 'tien_thu_du_kien'),
                    'actual_collection_date' => Arr::get($custom, 'ngay_thu_thuc_te'),
                    'actual_revenue' => Arr::get($custom, 'tien_thu_thuc_te'),
                    'classification' => Arr::get($custom, 'phan_loai'),
                    'after_service' => Arr::get($custom, 'dich_vu_af'),
                    'after_consulting_history' => Arr::get($custom, 'lich_su_tu_van_af'),
                    'booking_services' => json_encode(Arr::get($custom, 'dich_vu_booking', [])),
                    'booking_quantity' => Arr::get($custom, 'so_luong_booking'),
                    'expected_usage_date' => Arr::get($custom, 'ngay_du_kien_su_dung'),
                    'actual_usage_date' => Arr::get($custom, 'ngay_thuc_te_su_dung'),
                    'usage_location' => Arr::get($custom, 'dia_diem_su_dung'),
                    'executor' => Arr::get($custom, 'nguoi_thuc_hien'),
                    'booking_feedback' => Arr::get($custom, 'feedback_booking'),
                    'ref_policy' => Arr::get($custom, 'chinh_sach_ref'),
                    'ref_service' => Arr::get($custom, 'dich_vu_ref'),
                    'ref_value' => Arr::get($custom, 'gia_tri_ref'),
                ]
            );
        } catch (\Exception $e) {
            Log::error('Webhook Customer Save Error: ' . $e->getMessage());
            throw $e;
        }
    }
}

?>
