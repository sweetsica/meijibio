<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomersExport implements FromCollection, WithHeadings, WithMapping
{
    protected array $baseColumns = [];
    protected array $customFieldKeys = [];

    public function __construct()
    {
        // 1) Lấy danh sách cột gốc từ migration (trừ custom_fields vì sẽ tách riêng)
        $allColumns = Schema::getColumnListing('customers');
        $this->baseColumns = array_values(array_filter($allColumns, fn($c) => $c !== 'custom_fields'));

        // 2) Gom TẤT CẢ key trong custom_fields của mọi Customer
        $keys = [];
        Customer::query()
            ->select('id', 'custom_fields')
            ->whereNotNull('custom_fields')
            ->chunkById(1000, function ($rows) use (&$keys) {
                foreach ($rows as $row) {
                    $cf = $this->decodeCustomFields($row->custom_fields);
                    if (!empty($cf)) {
                        $flat = $this->flatten($cf);                  // 'contacts.0.name' => '...'
                        $keys = array_merge($keys, array_keys($flat));
                    }
                }
            });

        // 3) Loại trùng, giữ thứ tự xuất hiện
        $this->customFieldKeys = array_values(array_unique($keys));
    }

    public function collection()
    {
        // Lấy full model để map tất cả base columns + đọc custom_fields
        return Customer::all();
    }

    public function map($customer): array
    {
        $row = [];

        // 1) Ghi dữ liệu theo đúng thứ tự cột gốc
        foreach ($this->baseColumns as $col) {
            $row[] = $customer->{$col};
        }

        // 2) Ghi dữ liệu custom_fields theo đúng thứ tự key đã thu thập
        $cf    = $this->decodeCustomFields($customer->custom_fields);
        $flat  = $this->flatten($cf); // key như 'contacts.0.name'

        foreach ($this->customFieldKeys as $key) {
            $row[] = $flat[$key] ?? null; // giá trị có thể là số, chuỗi, null...
        }

        return $row;
    }

    public function headings(): array
    {
        // Base headings = tên cột gốc
        $headings = $this->baseColumns;

        // Custom field headings = cf_ + key đã normalize để dễ đọc trong Excel
        foreach ($this->customFieldKeys as $key) {
            $headings[] = 'cf_' . $this->normalizeKey($key);
        }

        return $headings;
    }

    /**
     * Giải mã custom_fields: có thể đã cast thành array, hoặc là JSON string.
     */
    private function decodeCustomFields($customFields): array
    {
        if (is_array($customFields)) {
            return $customFields;
        }
        if (is_string($customFields) && $customFields !== '') {
            $decoded = json_decode($customFields, true);
            return is_array($decoded) ? $decoded : [];
        }
        return [];
    }

    /**
     * Flatten mảng lồng: ['a' => ['b' => 1], 'c' => [ ['d' => 2] ]]
     * => ['a.b' => 1, 'c.0.d' => 2]
     */
    private function flatten(array $arr, string $prefix = ''): array
    {
        $out = [];
        foreach ($arr as $k => $v) {
            $key = $prefix === '' ? (string)$k : $prefix . '.' . $k;
            if (is_array($v)) {
                $out += $this->flatten($v, $key);
            } else {
                // cast scalar -> string/number; để nguyên tiếng Việt (json_decode đã unicode)
                $out[$key] = $v;
            }
        }
        return $out;
    }

    /**
     * Normalize key để làm heading thân thiện Excel:
     * 'contacts.0.name' -> 'contacts__0__name'
     */
    private function normalizeKey(string $key): string
    {
        return str_replace(['.', '[', ']'], ['__', '_', ''], $key);
    }
}
