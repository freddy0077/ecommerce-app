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
        '/add-to-timeline',
        '/register-user',
        '/register-new-user',
        '/register',
        '/fancy-it/*',
        '/like-it/*',
        'save-profile',
        '/login',
        'change-password',
        'add-new-shop',
        '/watch-shop/*/*',
        'store/add-store',
        '/store/store-settings',
        'store/add-product',
        'store/update-product/*',
        '/store/delete-product/*',
        'store/quick-add-products',
        'store/quick-add-product-partial/*',
        '/sub-categories-partial/*',
        'store/update-store',
        'store/add-to-cart/*/*/*/*/*',
        'store/remove-from-cart/*/*',
        'store/checkout-remove-from-cart/*',
        'store/update-cart/*/*/*',
        'store/check-out/*',
        'store/cart-view/*',
        'store/marketplace-packages/*',
        '/store/add-store-banner',
        'store/product-update-published',
        '/direct-pay/*',
        'admin/confirm-token/*',
        'admin/add-new-package',
        'admin/add-new-category',
        'admin/add-new-subcategory',
        'admin/update-category'
    ];
}
