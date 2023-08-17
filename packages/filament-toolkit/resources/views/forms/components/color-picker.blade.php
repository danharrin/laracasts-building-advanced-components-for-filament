@php use Filament\Support\Facades\FilamentAsset; @endphp
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    @php
        $width = $getWidth();
    @endphp

    <div
        ax-load
        ax-load-src="{{ FilamentAsset::getAlpineComponentSrc('color-picker', 'danharrin/filament-toolkit') }}"
        x-ignore
        x-data="colorPicker({ state: $wire.entangle('{{ $getStatePath() }}'), width: @js($width) })"
    >
        <div
            wire:ignore
            x-ref="picker"
        ></div>
    </div>
</x-dynamic-component>
