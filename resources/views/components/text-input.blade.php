<label>
    <span>
        {{ $getLabel() }}
    </span>

    <input type="text" maxlength="{{ $getMaxLength() }}" wire:model.live="{{ $getName() }}" />
</label>
