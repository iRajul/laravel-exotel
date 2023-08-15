<?php

namespace Irajul\Exotel;

use Irajul\Exotel\Commands\ExotelCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ExotelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-exotel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_exotel_table')
            ->hasCommand(ExotelCommand::class);
    }
}
