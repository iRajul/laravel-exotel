<?php

namespace Irajul\Exotel;

class ExotelResult
{
    public $success;

    public $data;

    public $error;

    public function __construct(bool $success, $data = null, string $error = null)
    {
        $this->success = $success;
        $this->data = $data;
        $this->error = $error;
    }
}
