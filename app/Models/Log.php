<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['title', 'noti_data', 'customer_data'];

    protected $casts = [
        // 'noti_data' => 'array',
        // 'customer_data' => 'array',
    ];
}
