<?php

namespace Irajul\Exotel\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use Irajul\Exotel\Facades\Exotel as ExotelFacade;
use Irajul\Exotel\Models\Exotel;

trait HasExotel
{
    public function callRecords(): MorphMany
    {
        return $this->morphMany(config('exotel.exotel_model'), 'model');
    }

    public function record($api, $from, $to, $response = [], $customProperties = [])
    {
        $call = Exotel::make([
            'from' => $from,
            'to' => $to,
            'uuid' => Str::uuid(),
            'api' => $api,
            'response' => $response,
            'custom_properties' => $customProperties,
        ]);

        $responsible = auth()->user();

        if ($responsible !== null) {
            $call->responsible()->associate($responsible);
        }

        $this->callRecords()->save($call);
    }

    public function connectCall($from, $to, $config_name = 'default', $customProperties = [])
    {
        $response = ExotelFacade::connectCall($from, $to);
        $this->record('connectCall', $from, $to, $response, $customProperties);
    }
}
