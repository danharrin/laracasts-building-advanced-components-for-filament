<?php

namespace DanHarrin\FilamentToolkit;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;

class FilamentToolkitServiceProvider extends \Spatie\LaravelPackageTools\PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-toolkit')
            ->hasViews();
    }

    public function packageBooted()
    {
        FilamentAsset::register([
            AlpineComponent::make('color-picker', __DIR__ . '/../dist/iro.js'),
        ], 'danharrin/filament-toolkit');
    }
}
