<?php

namespace Irajul\Exotel\Tests\TestModels;

use Illuminate\Database\Eloquent\Model;
use Irajul\Exotel\Traits\HasExotel;

class Booking extends Model
{
    use HasExotel;

    protected $guarded = [];
}
