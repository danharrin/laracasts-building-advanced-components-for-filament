<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div class="flex flex-wrap gap-1" x-data="{}">
        @foreach(\Illuminate\Support\Arr::wrap($getState()) as $state)
            <div
                x-tooltip.raw="{{ $state }}"
                @class([
                    'rounded',
                    match ($getWidth($state)) {
                        4 => 'h-4 w-4',
                        5 => 'h-5 w-5',
                        default => 'h-6 w-6',
                    },
                ])
                style="background-color: {{ $state }}"
            ></div>
        @endforeach
    </div>
</x-dynamic-component>
