<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Các URIs không cần CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        'customers/sync-by-getfly-id/*',
    ];
}
