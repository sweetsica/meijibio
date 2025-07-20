<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $connection = 'pgsql_main'; // Sử dụng kết nối PostgreSQL chính
    protected $table = 'customers';

    protected $fillable = ['account_name', 'customer_data'];
    protected $guarded = [''];

    protected $casts = [
        'customer_data' => 'array',
    ];
}
