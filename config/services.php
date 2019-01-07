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
     
       'client_id' => '270767836842469', //Facebook API
     
       'client_secret' => 'a21c9debb81cf4d29669d64239c6b684', //Facebook Secret
     
       'redirect' => 'http://laravel.localhost/login/facebook/callback',
     
    ],




'github' => [

   'client_id' => 'af54e6bae9a4edfc6cbb',

   'client_secret' => '95afc7b40e6aca6419a7623c34bb6d86cb2ac',

   'redirect' => 'http://laravel.localhost/login/github/callback',

],

'twitter' => [

   'client_id' => '8JS1GvRflY5g9N3kZc0heYTqL',

   'client_secret' => 'eYujptPLBAAzdHIz8hiqGgz4MkJTcmL1JAGEuEZsGU1MykjK',

   'redirect' => 'http://laravel.localhost/login/twitter/callback',

],

'github' => [
 
   'client_id' => 'af54e6bae9a4edfc6cbb',
 
   'client_secret' => '95afc7b40e6aca6419a7623c34bb6d86cb2ac',
 
   'redirect' => 'http://laravel.localhost/login/github/callback',
 
],
 
'twitter' => [
 
   'client_id' => '8JS1GvRflY5g9N3kZc0heYTqL',
 
   'client_secret' => 'eYujptPLBAAzdHIz8hiqGgz4MkJTcmL1JAGEuEZsGU1MykjK',
 
   'redirect' => 'http://laravel.localhost/login/twitter/callback',
 
],

];
