<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $connection = 'pgsql_main';
    protected $table = 'log'; // Tên bảng trong PostgreSQL

    protected $guarded = [''];

    protected $casts = [
        'noti_data' => 'array',
        'customer_data' => 'array',
    ];
}
