<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['title', 'noti_data', 'data'];

    protected $casts = [
        'noti_data' => 'array',
        'data' => 'array',
    ];
}
