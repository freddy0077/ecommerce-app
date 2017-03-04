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
        //
        '/',
        '/register-user',
        '/register',
        '/login',
        'store/add-store',
        '/store/store-settings',
        'store/add-product',
        'store/update-product/*',
        '/store/delete-product/*',
        'store/quick-add-products',
        'store/quick-add-product-partial/*',
        '/sub-categories-partial/*',
        'store/update-store',
        'store/add-to-cart/*/*/*/*',
        'store/remove-from-cart/*',
        'store/checkout-remove-from-cart/*',
        'store/update-cart/*/*',
        'store/cart-view'
    ];
}
