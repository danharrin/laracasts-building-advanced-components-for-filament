<?php

namespace DanHarrin\FilamentToolkit;

use Spatie\LaravelPackageTools\Package;

class FilamentToolkitServiceProvider extends \Spatie\LaravelPackageTools\PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-toolkit')
            ->hasViews();
    }
}
