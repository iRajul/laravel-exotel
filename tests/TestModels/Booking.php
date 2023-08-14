<?php
namespace Irajul\Exotel\Tests\TestModels;

use Irajul\Exotel\Traits\HasExotel;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasExotel;

    protected $guarded = [];
}