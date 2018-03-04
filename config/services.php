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
        'client_id' => env('183808232225306'),         // Your GitHub Client ID
        'client_secret' => env('5bf0cfb33d8951a9053a7f8c9cdf10f2'), // Your GitHub Client Secret
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    'twitter' => [
        'client_id' => env('egkGrwqrA3pF1r8nvJ7xfzC0A'),         // Your GitHub Client ID
        'client_secret' => env('bGPWr9c00wCZ8KThARkUZ9hV4o96U5gpm2IoMd6dMoU7SVQDpr'), // Your GitHub Client Secret
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],
    'google' => [
        'client_id' => env('277987281706-gnjco6gj00ni2dq3f1a9pophhoqup7ts.apps.googleusercontent.com'),         // Your GitHub Client ID
        'client_secret' => env('QgaQy5e5961kF6bmtnQ6wH4y'), // Your GitHub Client Secret
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
