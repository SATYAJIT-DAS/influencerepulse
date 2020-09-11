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
    'mail' => [
        'host' => env('MAIL_HOST'),
        'port' => env('MAIL_PORT'),
        'username' => env('MAIL_USERNAME'),
        'password' => env('MAIL_PASSWORD'),
        'from_email' => env('MAIL_FROM_EMAIL'),
        'from_name' => env('MAIL_FROM_NAME')
    ],
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'facebook' => [
                'client_id' => env ( 'FB_CLIENT_ID' ),
                'client_secret' => env ( 'FB_CLIENT_SECRET' ),
                'redirect' => env ( 'FB_REDIRECT' )
        ],
    'google' => [
        'client_id' => env ( 'G_CLIENT_ID' ),
        'client_secret' => env ( 'G_CLIENT_SECRET' ),
        'redirect' => env ( 'G_REDIRECT' )
    ],
    'nexmo' => [
        'key'  => env('NEXMO_KEY'),
        'secret'  => env('NEXMO_SECRET')
    ],
    'twilio' => [
        'accountSid' => env('TWILIO_ACCOUNT_SID'),
        'apiKey' => env('TWILIO_API_KEY'),
        'apiSecret' => env('TWILIO_API_SECRET'),
        'chatServiceSid' => env('TWILIO_CHAT_SERVICE_SID'),
    ],
    'razor' => [
        'key' => env('RAZORPAY_KEY'),
        'secret' => env('RAZORPAY_SECRET'),
    ],

];
