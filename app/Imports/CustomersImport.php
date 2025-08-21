<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CustomersImport implements ToModel, WithHeadingRow, SkipsEmptyRows, WithChunkReading
{
    public function startRow(): int
    {
        return 2; // bỏ qua header
    }
    

    public function model(array $row)
    {   
        if (!empty($row['error'])) 
        {
            return null; 
        }
        return new Customer([
            'getfly_id' => $row['id'] ?? null,
            'account_code' => $row['account_code'] ?? null,
            'account_name' => $row['account_name'] ?? null,
            'description' => $row['description'] ?? null,
            'billing_address_street' => $row['billing_address_street'] ?? null,
            'phone_office' => $row['phone_office'] ?? null,
            'email' => $row['email'] ?? null,
            'mgr_email' => $row['mgr_email'] ?? null,
            'mgr_display_name' => $row['mgr_display_name'] ?? null,
            'website' => $row['website'] ?? null,
            'logo' => $row['logo'] ?? null,
            'birthday' => $row['birthday'] ?? null,
            'sic_code' => $row['sic_code'] ?? null,
            'account_manager' => $row['account_manager'] ?? null,
            'total_point_bonus' => $row['total_point_bonus'] ?? 0,
            'total_cash_bonus' => $row['total_cash_bonus'] ?? 0,
            'detail_custom_fields' => $row['detail_custom_fields'] ?? null,
            'custom_fields' => $row['custom_fields'] ?? null,
            'contacts' => $row['contacts'] ?? null,
            'accessible_user_ids' => $row['accessible_user_ids'] ?? null,
            'relation_id' => $row['relation_id'] ?? null,
            'relation_name' => $row['relation_name'] ?? null,
            'gender' => $row['gender'] ?? null,
            'total_revenue' => $row['total_revenue'] ?? null,
            'country_name' => $row['country_name'] ?? null,
            'country_code' => $row['country_code'] ?? null,
            'country_id' => $row['country_id'] ?? null,
            'province_id' => $row['province_id'] ?? null,
            'district_id' => $row['district_id'] ?? null,
            'ward_id' => $row['ward_id'] ?? null,
            'industry' => $row['industry'] ?? null,
        ]);
    }

    public function chunkSize(): int
    {
        return 100; // đọc 100 dòng/lần
    }
}
