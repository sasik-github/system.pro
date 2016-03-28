<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'payment/success',
        'payment/fail',
        'payment/result',
    ];

//    protected function tokensMatch($request)
//    {
//        $tokenMatch = parent::tokensMatch($request);
//        if ($tokenMatch) {
//            $request->session()->regenerateToken();
//        }
//
//        return $tokenMatch;
//    }
}
