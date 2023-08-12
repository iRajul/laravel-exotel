<?php

namespace Irajul\Exotel\Commands;

use Illuminate\Console\Command;

class ExotelCommand extends Command
{
    public $signature = 'laravel-exotel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
