<?php

namespace Irajul\Exotel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Exotel extends Model
{
    protected $table = 'exotel_table';

    protected $guarded = [];

    protected $casts = [
        'response' => 'array',
        'custom_properties' => 'array',
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function responsible() : MorphTo
    {
        return $this->morphTo();
    }
}
