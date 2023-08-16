<script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5"></script>

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    @php
        $width = $getWidth();
    @endphp

    <div
        x-data="{ state: $wire.entangle('{{ $getStatePath() }}') }"
        x-init="
            const colorPicker = new iro.ColorPicker($refs.picker, {
                @if ($width)
                    width: @js($width),
                @endif
                color: state,
            });

            colorPicker.on('color:change', (color) => {
                state = color.hexString
            })
        "
    >
        <div
            wire:ignore
            x-ref="picker"
        ></div>
    </div>
</x-dynamic-component>
