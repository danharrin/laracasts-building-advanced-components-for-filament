<?php

namespace DanHarrin\FilamentToolkit\Forms\Components;

use DanHarrin\FilamentToolkit\Concerns\CanBeSection;
use Filament\Forms\Components\Component;

class Section extends Component
{
    use CanBeSection;

    protected string $view = 'filament-toolkit::section';
}
