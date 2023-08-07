<label>
    <span>
        {{ $getLabel() }}
    </span>

    <input type="text" wire:model.live="{{ $getName() }}" />
</label>
