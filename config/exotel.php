<?php

// config for Irajul/Exotel
return [
    /*
     * Exotel SID
     */
    'EXOTEL_SID' => env('EXOTEL_SID', ''),

    /*
    * Exotel Token
    */

    'EXOTEL_TOKEN' => env('EXOTEL_TOKEN', ''),

    /*
    * Exotel Key
    */
    'EXOTEL_KEY' => env('EXOTEL_KEY', ''),

    /*
    * Exotel Subdomain
    */
    'EXOTEL_SUBDOMAIN' => env('EXOTEL_SUBDOMAIN', ''),

    /*
     * The fully qualified class name of the media model.
     */
    'exotel_model' => Irajul\Exotel\Models\Exotel::class,
];
