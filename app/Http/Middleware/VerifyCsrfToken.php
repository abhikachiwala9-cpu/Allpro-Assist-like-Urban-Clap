<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/api_register',
        '/api_login',
        '/api_addbooking',
        '/api_getbooking',
        "/api_loginpartner",
        "/api_removebooking",
        "/api_applycoupon",
        "/api_confirmorder",
        "/api_getOrderhistory"
    ];
}
