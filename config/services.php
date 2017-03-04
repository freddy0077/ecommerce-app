<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1881243878788500',
        'client_secret' => '3f837fa9bb540f2af573cc784ab55ffa',
        'redirect' => 'http://shopaholick.dev/callback/facebook',
    ],

    'twitter' => [
        'client_id' => '0asKLwSANwbvmWchjfVmNOpZR',
        'client_secret' => '6MabtW028ZAFCI7nFvbOG77I5pu9oLZfqZshEkM6MAkLAYDpsq',
        'redirect' => 'http://shopaholick.dev/callback/twitter',
    ],

    'google' => [
        'client_id' => '569204605456-0tjeklhs5vkiu9b9nsnbrdti12f0u8i5.apps.googleusercontent.com',
        'client_secret' => 'Qs6AnnYqqDFKiMe4WcEmNkA5',
        'redirect' => 'http://shopaholick.dev/callback/google',
    ],

];
