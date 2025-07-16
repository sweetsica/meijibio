<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['title', 'notiData', 'customerData'];

    protected $casts = [
        'notiData' => 'array',
        'customerData' => 'array',
    ];
}
