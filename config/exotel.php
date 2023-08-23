<?php

// config for Irajul/Exotel
return [

    'exotel_configs' => [
        [
            'name' => 'default',
            /*
            * Exotel SID
            */
            'exotel_sid' => env('EXOTEL_SID', ''),

            /*
            * Exotel Token
            */

            'exotel_token' => env('EXOTEL_TOKEN', ''),

            /*
            * Exotel Key
            */
            'exotel_key' => env('EXOTEL_KEY', ''),

            /*
            * Exotel Subdomain
            */
            'exotel_subdomain' => env('EXOTEL_SUBDOMAIN', ''),

            /*
            * Exotel Caller ID
            */
            'exotel_caller_id' => env('EXOTEL_CALLER_ID', ''),
        ],
    ],

    /*
     * The fully qualified class name of the media model.
     */
    'exotel_model' => Irajul\Exotel\Models\Exotel::class,
];
