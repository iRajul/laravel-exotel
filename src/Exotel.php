<?php

namespace Irajul\Exotel;

use Illuminate\Support\Facades\Http;

class Exotel
{
    protected $sid;

    protected $token;

    protected $key;

    protected $subdomain;

    protected $callerId;

    public function __construct()
    {
        
    }

    /*
        * Outgoing call to connect two numbers
        * @param string $from
        * @param string $to
        * @param string $callerId
    */
    public function connectCall(string $from, string $to, string $config_name = 'default')
    {
        $configs = config("exotel.exotel_configs");

        collect($configs)->each(function ($config) use ($config_name) {
            if ($config['name'] == $config_name) {
                $this->sid = $config['exotel_sid'];
                $this->token = $config['exotel_token'];
                $this->key = $config['exotel_key'];
                $this->subdomain = $config['exotel_subdomain'];
                $this->callerId = $config['exotel_caller_id'];
            }
        });

        $url = "https://{$this->key}:{$this->token}@{$this->subdomain}.exotel.com/v1/Accounts/{$this->sid}/Calls/connect.json";
        $data = [
            'From' => $from,
            'To' => $to,
            'CallerId' => $this->callerId,
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
