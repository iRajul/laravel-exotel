<?php

namespace Irajul\Exotel;

use Illuminate\Support\Facades\Http;

class Exotel
{
    protected $sid;

    protected $token;

    protected $key;

    protected $subdomain;

    public function __construct()
    {
        $this->sid = config('exotel.EXOTEL_SID');
        $this->token = config('exotel.EXOTEL_TOKEN');
        $this->key = config('exotel.EXOTEL_KEY');
        $this->subdomain = config('exotel.EXOTEL_SUBDOMAIN');
    }

    /*
        * Outgoing call to connect two numbers
        * @param string $from
        * @param string $to
        * @param string $callerId
    */
    public function connectCall(string $from, string $to, string $callerId)
    {
        $url = "https://{$this->key}:{$this->token}@{$this->subdomain}.exotel.com/v1/Accounts/{$this->sid}/Calls/connect.json";
        $data = [
            'From' => $from,
            'To' => $to,
            'CallerId' => $callerId,
        ];
        // use Http post facade to make the call handle all the authentication and headers and handle error scnerio
        try {
            $response = Http::asForm()->post($url, $data);

            if ($response->successful()) {
                return [
                    'success' => true,
                    'data' => $response->json(),
                    'error' => false,
                ];
            } else {
                return [
                    'success' => false,
                    'data' => [],
                    'error' => "Exotel API Error - Status: {$response->status()}",
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'data' => [],
                'error' => "Exotel API Exception - {$e->getMessage()}",
            ];
        }
    }
}
