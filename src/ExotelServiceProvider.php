<?php

namespace Irajul\Exotel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Irajul\Exotel\Commands\ExotelCommand;

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
            ->hasMigration('create_laravel-exotel_table')
            ->hasCommand(ExotelCommand::class);
    }
}
