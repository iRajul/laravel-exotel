<?php

namespace Irajul\Exotel;

use Illuminate\Support\Facades\Http;

class Exotel
{
    protected $sid;

    protected $token;

    protected $key;

    protected $subdomain;

    public function __construct(string $sid, string $token, string $key, string $subdomain)
    {
        $this->sid = $sid;
        $this->token = $token;
        $this->key = $key;
        $this->subdomain = $subdomain;
    }

    /*
        * Outgoing call to connect two numbers
        * @param string $from
        * @param string $to
        * @param string $callerId
    */
    public function connectCall(string $from, string $to, string $callerId)
    {
        $url = "https://{$this->subdomain}.exotel.com/v1/Accounts/{$this->sid}/Calls/connect.json";
        $data = [
            'From' => $from,
            'To' => $to,
            'CallerId' => $callerId,
        ];
        // use Http post facade to make the call handle all the authentication and headers and handle error scnerio
        try {
            $response = Http::withBasicAuth($this->key, $this->token)->post($url, $data);

            if ($response->successful()) {
                return new ExotelResult(true, $response->json());
            } else {
                return new ExotelResult(false, null, "Exotel API Error - Status: {$response->status()}");
            }
        } catch (\Exception $e) {
            return new ExotelResult(false, null, "Exotel API Exception - {$e->getMessage()}");
        }
    }
}
