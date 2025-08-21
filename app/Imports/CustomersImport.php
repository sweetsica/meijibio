<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;

class CustomersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        // Bỏ qua header (dòng 1)
        $rows->skip(1)->each(function ($row) {
            try {
                // Map dữ liệu
                $data = [
                    'account_code' => $row[0] ?? null,
                    'account_name' => $row[1] ?? null,
                    'description' => $row[2] ?? null,
                    'billing_address_street' => $row[3] ?? null,
                    'phone_office' => $row[4] ?? null,
                    'email' => $row[5] ?? null,
                    'mgr_email' => $row[6] ?? null,
                    'mgr_display_name' => $row[7] ?? null,
                    'website' => $row[8] ?? null,
                    'logo' => $row[9] ?? null,
                    'birthday' => $row[10] ?? null,
                    'sic_code' => $row[11] ?? null,
                    'relation_id' => $row[15] ?? null,
                    'relation_name' => $row[16] ?? null,
                    'gender' => $row[17] ?? null,
                    'total_revenue' => $row[18] ?? 0,
                    'country_name' => $row[19] ?? null,
                    'country_code' => $row[20] ?? null,
                    'country_id' => $row[21] ?? null,
                    'province_id' => $row[22] ?? null,
                    'district_id' => $row[23] ?? null,
                    'ward_id' => $row[24] ?? null,
                    'industry' => $row[25] ?? null,
                    'account_manager' => $row[26] ?? null,
                    'total_point_bonus' => $row[27] ?? 0,
                    'total_cash_bonus' => $row[28] ?? 0,
                    'error' => $row[39] ?? null,
                ];

                // Các trường JSON cần parse (nếu Excel chứa chuỗi JSON hoặc mảng)
                $jsonFields = [
                    29 => 'detail_custom_fields',
                    30 => 'custom_fields',
                    31 => 'contacts',
                    32 => 'accessible_user_ids',
                    33 => 'account_type_details',
                    34 => 'account_source_details',
                    35 => 'industry_details',
                    36 => 'account_relation_detail',
                    37 => 'gender_detail',
                    38 => 'country_detail',
                    40 => 'province_detail',
                    41 => 'district_detail',
                    42 => 'ward_detail',
                ];

                foreach ($jsonFields as $index => $field) {
                    if (!empty($row[$index])) {
                        // Nếu là chuỗi JSON thì decode
                        $parsed = json_decode($row[$index], true);
                        $data[$field] = $parsed ? $parsed : [$row[$index]];
                    } else {
                        $data[$field] = null;
                    }
                }

                // Lưu DB (cập nhật nếu đã có account_code)
                User::updateOrCreate(
                    ['account_code' => $data['account_code']],
                    $data
                );
            } catch (\Exception $e) {
                Log::error("Import error: " . $e->getMessage(), [
                    'row' => $row->toArray()
                ]);
            }
        });
    }
}
