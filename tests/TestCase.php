<?php

namespace Irajul\Exotel\Tests;

use CreateBookingTable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Irajul\Exotel\ExotelServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Irajul\\Exotel\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            ExotelServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__.'/../database/migrations/create_exotel_table.php.stub';
        $migration->up();

        include_once __DIR__.'/database/migrations/create_booking_table.php';
        (new CreateBookingTable())->up();

    }
}
